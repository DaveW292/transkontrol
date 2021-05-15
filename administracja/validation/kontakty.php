<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: ../administracja');
        exit();
    }

    if(isset($_POST['tkid']))
    {
        $everything_OK=true;

        $tkid = $_POST['tkid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        require_once "redirects/db-management.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0) throw new Exception(mysqli_connect_errno());
            else
            {
                //czy numer sluzbowy juz isnieje?
                $result = $connection->query("SELECT tkid FROM users WHERE tkid='$tkid'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tkids = $result->num_rows;
                if($how_many_tkids>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_tkid']="Podany numer służbowy jest już w bazie!";
                }

                //czy numer telefonu juz isnieje?
                $result = $connection->query("SELECT tkid FROM users WHERE phone='$phone'");
                if(!$result) throw new Exception($connection->error);
            
                $how_many_phones = $result->num_rows;
                if($how_many_phones>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_phone']="Podany numer telefonu jest już w bazie!";
                }

                //czy login juz isnieje?
                $result = $connection->query("SELECT tkid FROM users WHERE login='$login'");
                if(!$result) throw new Exception($connection->error);
                
                $how_many_logins = $result->num_rows;
                if($how_many_logins>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_login']="Podany login jest już w bazie!";
                }

                if($everything_OK==true)
                {
                    $sql = "INSERT INTO users VALUES('$tkid', '$name', '$phone', '$login', '$password', '$role')";

                    if(mysqli_query($connection, $sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: kontakty');
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
    include_once 'redirects/db-management.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Could not Connect My Sql:');

    $display = mysqli_query($connection, "SELECT * FROM users");

    $login = $_SESSION['login'];
    $currentIdRole = mysqli_query($connection, "SELECT * FROM users WHERE login='$login'");
    if ($currentIdRole->num_rows > 0) 
    {
        while($row = $currentIdRole->fetch_assoc()) 
        {
            $currentRole = $row["role"];
        }
    }
    $connection->close();
?>
