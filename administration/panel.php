<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='logout.php'>Wyloguj się!</a>";

        if($_SESSION['login'] == 'root')
        {
            include 'form.php';
        }
        else
        {
            echo 'hej';
        }
    ?>
</body>