<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: ../administracja');
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
                    $result = "INSERT INTO news VALUES(NULL, '$date', '$author', '$contents')";

                    if(mysqli_query($connection, $result))
                    {
                        $_SESSION['sent']=true;
                        header('Location: aktualnosci');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                }        
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
    if(!$connection) die('Nie można połączyć się z bazą danych!');
    
    $display = mysqli_query($connection,"SELECT * FROM news");
    
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
