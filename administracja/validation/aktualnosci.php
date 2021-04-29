<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }

    if(isset($_POST['contents']))    
    {
        $everything_OK=true;

        $date = $_POST['date'];
        $author = $_POST['author'];
        $contents = $_POST['contents'];

        require_once "redirects/db-management.php";
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
                    $sql = "INSERT INTO news VALUES(NULL, '$date', '$author', '$contents')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: aktualnosci');
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
    include_once 'redirects/db-management.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn) die('Could not Connect My Sql:');
    
    $result = mysqli_query($conn,"SELECT * FROM news");
    
    $login = $_SESSION['login'];
    $currentRole = mysqli_query($conn, "SELECT role FROM users WHERE login='$login'");
    
    $conn->close();
?>
