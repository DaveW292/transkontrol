<?php
    session_start();

    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: kontakty');
        exit();
    }
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ZALOGUJ</title>
</head>
<body>
    <form action="redirects/login.php" method="post">
        Login:  <br><input type="text" name="login"><br>
        Hasło:  <br><input type="password" name="password"><br><br>
        <input type="submit" value="Zaloguj się">
    </form>
    
    <?php
        if(isset($_SESSION['error'])) echo $_SESSION['error'];
    ?>
</body>