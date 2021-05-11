<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }

    $carriers = array("Rokbus (Rokietnica)", "ZKP Suchy Las", "Transkom (Murowana Goślina, Czerwonak)", "PUK Komorniki",
    "PUK Dopiewo", "Warbus (Oborniki)", "Marco Polo", "PKS Poznań");

    $shifts = array("monday1", "monday2",
    "tuesday1", "tuesday2",
    "wednesday1", "wednesday2",
    "thursday1", "thursday2",
    "friday1", "friday2",
    "saturday1", "saturday2",
    "sunday1", "sunday2");

    $days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
    $daysEn = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
    // aktualizacja tabeli
    if(isset($_POST['dateStartUpdate']) && isset($_POST['dateEndUpdate']))
    {
        $everything_OK=true;
        require_once "redirects/db-schedules.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0) throw new Exception(mysqli_connect_errno());
            else
            {
                if($everything_OK==true)
                {
                    $dateStartUpdate = $_POST['dateStartUpdate'];
                    $dateEndUpdate = $_POST['dateEndUpdate'];
                    $tmpTableName = $dateStartUpdate."_".$dateEndUpdate;
                    $tableName = str_replace("-","",$tmpTableName);
                    $shift = $_POST['day'].$_POST['hour'];
                    $carrier = $_POST['carrier'];
                    $team = $_POST['UnitA'].' - '.$_POST['UnitB'];

                    if(mysqli_query($connection, "UPDATE $tableName SET $shift = '$team' WHERE carrier = '$carrier'"))
                    {
                        $_SESSION['sent']=true;
                        header('Location: grafik');
                    }
                    else throw new Exception($connection->error);
                }
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
    
    // usuwanie tabeli
    if(isset($_POST['dateStartDelete']) && isset($_POST['dateEndDelete']))
    {
        $everything_OK=true;
        require_once "redirects/db-schedules.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                if($everything_OK==true)
                {
                    $dateStartDelete = $_POST['dateStartDelete'];
                    $dateEndDelete = $_POST['dateEndDelete'];
                    $tmpTableName = $dateStartDelete."_".$dateEndDelete;
                    $tableName = str_replace("-","",$tmpTableName);

                    if(mysqli_query($connection, "DROP TABLE $tableName"))
                    {
                        $_SESSION['sent']=true;
                        header('Location: grafik');
                    }
                    else throw new Exception($connection->error);
                }
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
    // wyświetlanie tabeli
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $tmpTableName = $dateStart."_".$dateEnd;
    $tableName = str_replace("-","",$tmpTableName);

    include_once 'redirects/show-tables.php';
    $newestTable = mysql_tablename($showTables, (mysql_num_rows($showTables)-1));

    include_once 'redirects/db-schedules.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Could not Connect My Sql:');

    if(!isset($dateStart) && !isset($dateEnd)) $query = "SELECT * FROM $newestTable";
    else $query = "SELECT * FROM $tableName";
    $result = mysqli_query($connection, $query);
    $connection->close();
    mysql_free_result($showTables);

    // pobieranie uprawnienia oraz id zalogowanego użytkownika
    include_once 'redirects/db-management.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Could not Connect My Sql:');

    $login = $_SESSION['login'];
    $currentRole = mysqli_query($connection, "SELECT role FROM users WHERE login='$login'");
    $currentTkid = mysqli_query($connection, "SELECT tkid FROM users WHERE login='$login'");
    $connection->close();
?>
