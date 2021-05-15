<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }

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
                        $query = "SELECT * FROM $tableName";
                        $result = mysqli_query($connection, $query);    
                    }
                    else throw new Exception($connection->error);
                }
                // $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }



    // wyświetlanie tabeli
    if(isset($_POST['dateStart']) && isset($_POST['dateEnd']))
    {
        $everything_OK=true;
        require_once "redirects/db-availability.php";
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
                $dateStart = $_POST['dateStart'];
                $dateEnd = $_POST['dateEnd'];
                $tmpTableName = $dateStart."_".$dateEnd;
                $tableName = str_replace("-","",$tmpTableName);

                $result = $connection->query("SELECT tkid from $tableName");
                $rowsCounter = $result->num_rows;
        
                //sprawdzanie istnienia grafiku
                $result = $connection->query("SELECT Table_name from information_schema.tables WHERE Table_name = '$tableName'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tables = $result->num_rows;
                if($how_many_tables==0)
                {
                    $everything_OK=false;
                    $_SESSION['e_read']="Grafik z wybranego przedziału nie istnieje!";
                }

                if($everything_OK==true)
                {
                    $query = "SELECT * FROM $tableName";
                    $display = mysqli_query($connection, $query);
                }
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
    else
    {
        include_once 'redirects/show-tables.php';
        $newestTable = mysql_tablename($showAvailability, (mysql_num_rows($showAvailability)-1));

        include_once 'redirects/db-availability.php';
        $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
        if(!$connection) die('Nie można połączyć się z bazą danych!');

        if(isset($tableName)) $result = $connection->query("SELECT tkid from $tableName");
        else $result = $connection->query("SELECT tkid from $newestTable");
        $rowsCounter = $result->num_rows;

        $query = "SELECT * FROM $newestTable";
        $display = mysqli_query($connection, $query);
        mysql_free_result($showAvailability);
    }
    // pobieranie uprawnienia oraz id zalogowanego użytkownika
    include_once 'redirects/db-management.php';
    $connection = mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Nie można połączyć się z bazą danych!');

    $login = $_SESSION['login'];
    $currentIdRole = mysqli_query($connection, "SELECT * FROM users WHERE login='$login'");
    if ($currentIdRole->num_rows > 0) 
    {
        while($row = $currentIdRole->fetch_assoc()) 
        {
            $currentRole = $row["role"];
            $currentTkid = $row["tkid"];
        }
    }
?>