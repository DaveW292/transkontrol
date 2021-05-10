<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }    

    if(isset($_POST['tkid']))
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
                    //Hurra, wszystkie testy zaliczone!
                    #sql query to insert into database
                    $sql = "INSERT INTO users VALUES('$tkid', '$name', '$phone', '$login', '$password', '$role')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: kontakty');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
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

    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];

    $tmpTableName = $dateStart."_".$dateEnd;
    $tableName = str_replace("-","",$tmpTableName);

    include_once 'redirects/show-tables.php';
    $newestTable = mysql_tablename($showTables, (mysql_num_rows($showTables)-1));

    include_once 'redirects/db-schedules.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn) die('Could not Connect My Sql:');
    if(!isset($dateStart) && !isset($dateEnd)) $query = "SELECT * FROM $newestTable";
    else $query = "SELECT * FROM $tableName";
    
    $result = mysqli_query($conn, $query);

    $conn->close();
    mysql_free_result($showTables);


    include_once 'redirects/db-management.php';
    $conn2=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn2) die('Could not Connect My Sql:');
    $login = $_SESSION['login'];
    $currentRole = mysqli_query($conn2, "SELECT role FROM users WHERE login='$login'");
    $conn2->close();
?>
