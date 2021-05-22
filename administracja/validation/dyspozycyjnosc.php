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

    // pobieranie uprawnienia oraz id zalogowanego użytkownika
    include_once 'redirects/db-management.php';
    $managementCon = mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$managementCon) die('Could not Connect My Sql:');

    $login = $_SESSION['login'];
    $currentRole = mysqli_query($managementCon, "SELECT role FROM users WHERE login='$login'");
    $currentTkid = mysqli_query($managementCon, "SELECT tkid FROM users WHERE login='$login'");

    if ($currentRole->num_rows > 0) {
        while($row = $currentRole->fetch_assoc()) {
            $myRole = $row["role"];
        }
    }
    if ($currentTkid->num_rows > 0) {
        while($row = $currentTkid->fetch_assoc()) {
            $myTkid = $row["tkid"];
        }
    }

    // tworzenie wiersza dyspozycyjności
    if(isset($_POST['tkid']))
    {
        $everything_OK=true;

        $date = $_POST['date'];
        $dateStartCreate = $_POST['dateStartCreate'];
        $dateEndCreate = $_POST['dateEndCreate'];
        $tkid = $_POST['tkid'];
        for($x = 0; $x < sizeof($shifts); $x++) {
            $zmiany[$x] = $_POST[$shifts[$x]];
        }

        require_once "redirects/db-availability.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0) throw new Exception(mysqli_connect_errno());
            else
            {
                //sprawdzanie istnienia grafiku
                $tmpTableName = $dateStartCreate."_".$dateEndCreate;
                $tableName = str_replace("-","",$tmpTableName);

                $result = $connection->query("SELECT Table_name from information_schema.tables WHERE Table_name = '$tableName'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tables = $result->num_rows;
                if($how_many_tables == 0)
                {
                    $everything_OK=false;
                    $_SESSION['e_create']="Grafik z wybranego przedziału nie istnieje!";
                }

                if($everything_OK==true)
                {
                    // Dodaj wiersze
                    for($x = 0; $x < sizeof($shifts); $x++) {
                        if ($x == 0) $values .= "('".$tkid."', '".$zmiany[$x]."', ";
                        else if ($x + 1 == sizeof($shifts)) $values .= "'".$zmiany[$x]."', '".$date."')";
                        else $values .= "'".$zmiany[$x]."', ";
                    }

                    $query = "INSERT INTO $tableName (tkid, ".implode(", ", $shifts).", date) VALUES".$values;

                    if(mysqli_query($connection, $query))
                    {
                        $_SESSION['sent'] = true;
                        // header('Location: ../dyspozycyjnosc');
                        if(isset($_SESSION['e_create'])) unset($_SESSION['e_create']);
                    }
                    else throw new Exception($connection -> error);
                }        
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }

    // aktualizacja tabeli
    if(isset($_POST['dateStartUpdate']) && isset($_POST['dateEndUpdate']))
    {
        $everything_OK=true;
        require_once "redirects/db-availability.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $availabilityCon = new mysqli($host, $db_user, $db_password, $db_name);
            if($availabilityCon->connect_errno!=0) throw new Exception(mysqli_connect_errno());
            else
            {
                if($everything_OK==true)
                {
                    $dateStartUpdate = $_POST['dateStartUpdate'];
                    $dateEndUpdate = $_POST['dateEndUpdate'];
                    $tmpTableName = $dateStartUpdate."_".$dateEndUpdate;
                    $tableName = str_replace("-","",$tmpTableName);
                    $tkid = $_POST['tkid'];
                    $shift = $_POST['day'].$_POST['hour'];
                    $availability = $_POST['availability'];

                    if(mysqli_query($availabilityCon, "UPDATE $tableName SET $shift = '$availability' WHERE tkid = '$tkid'"))
                    {
                        $_SESSION['sent']=true;
                        $query = "SELECT * FROM $tableName";
                        $result = mysqli_query($availabilityCon, $query);    
                    }
                    else throw new Exception($availabilityCon->error);
                }
            }
            $availabilityCon->close();
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
                //sprawdzanie istnienia grafiku
                $result = $connection->query("SELECT Table_name from information_schema.tables WHERE Table_name = '$tableName'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tables = $result->num_rows;
                if($how_many_tables==0)
                {
                    $everything_OK=false;
                    $_SESSION['e_read']="Grafik z wybranego przedziału nie istnieje!";
                }

                                //sprawdzanie czy wiersz jest uzupełniony
                                $result = $connection->query("SELECT * FROM $tableName WHERE tkid = '$myTkid'");
                                if(!$result) throw new Exception($connection->error);
                
                                $how_many_records = $result->num_rows;
                                if($how_many_records == 0)
                                {
                                    $everything_OK=false;
                                    $_SESSION['e_read']="Uzupełnij tabelę!";
                                }                

                if($everything_OK==true)
                {
                    if($myRole == "admin") $query = "SELECT * FROM $tableName";
                    else $query = "SELECT * FROM $tableName WHERE tkid = '$myTkid'";
                    $result = mysqli_query($connection, $query);
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
    else
    {
        if(isset($dateStartUpdate) && isset($dateEndUpdate))
        {
            $dateStart = $dateStartUpdate;
            $dateEnd = $dateEndUpdate;
        }
        else
        {
            include_once 'redirects/show-tables.php';
            $newestTable = mysql_tablename($showAvailability, (mysql_num_rows($showAvailability)-1));
        
            include_once 'redirects/db-availability.php';
            $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
            if(!$connection) die('Could not Connect My Sql:');
        
            if($myRole == "admin") $query = "SELECT * FROM $newestTable";
            else $query = "SELECT * FROM $newestTable WHERE tkid = '$myTkid'";
            $result = mysqli_query($connection, $query);
            $connection->close();
            mysql_free_result($showAvailability);
        }
    }
?>