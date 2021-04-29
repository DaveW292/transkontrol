<?php

    session_start();

    if(!isset($_POST['login']) || (!isset($_POST['password'])))
    {
        header('Location: ../zaloguj');
        exit();
    }

    require_once "db-management.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        if($result = @$connection->query(
        sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'",
        mysqli_real_escape_string($connection, $login),
        mysqli_real_escape_string($connection, $password))))
        {
            $how_many_users = $result->num_rows;
            if($how_many_users>0)
            {
                $_SESSION['logged'] = true;
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                
                unset($_SESSION['error']);
                $result->free_result();
                header('Location: ../kontakty');
            }
            else
            {
                $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: ../zaloguj');
            }
        }

        $connection->close();
    }

?>