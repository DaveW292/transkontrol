<?php include "validation/kontakty.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="../styles/panel.css">
</head>
<body>
    <nav>
        <h2>Kontakty</h2>
        <a href="aktualnosci"><h2>Aktualności</h2></a>
        <a href="grafik"><h2>Grafik</h2></a>
        <a href="dyspozycyjnosc"><h2>Dyspozycyjność</h2></a>
    </nav>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";
        // tworzenie kontaktu
        if($currentRole == "admin")
        { ?>
            <form action="kontakty" method="post">
                <fieldset>
                    <legend>Dodaj kontakt</legend>
                    Numer służbowy<input type="text" name="tkid" required><br>
                    Imię<input type="text" name="name" required><br>
                    Numer telefonu<input type="text" name="phone" required><br>
                    Nazwa użytkownika<input type="text" name="login" required><br>
                    Hasło<input type="password" name="password" required><br>
                    Uprawnienia
                    <select name="role">
                        <option>user</option>
                        <option>admin</option>
                    </select><br>
                    <input type="submit" value="DODAJ">
                </fieldset>
            </form>
        <?php }
            if(isset($_SESSION['e_tkid']))
            {
                echo '<div class="error">'.$_SESSION['e_tkid'].'</div>';
                unset($_SESSION['e_tkid']);
            }
            if(isset($_SESSION['e_phone']))
            {
                echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
                unset($_SESSION['e_phone']);
            }
            if(isset($_SESSION['e_login']))
            {
                echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);
            }
        ?>
    <br>
    <!-- wyświetlanie kontaktów -->
    <table border= "1px, solid, black">
        <tr>
            <td>Numer służbowy</td>
            <td>Imię</td>
            <td>Numer telefonu</td>
            <?php if($currentRole == "admin") { ?>
                <td>Nazwa użytkownika</td>
                <td>Uprawnienia</td>
                <td>Akcja</td>
            <?php } ?>
        </tr>
        <?php
            $i=0;
            while($row = mysqli_fetch_array($display))
            { ?>
        <tr>
            <td><?php echo $row["tkid"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <?php if($currentRole == "admin") echo "<td>".$row["login"]."</td>"; ?>
            <?php if($currentRole == "admin") echo "<td>".$row["role"]."</td>"; ?>
            <?php if($currentRole == "admin") 
                    if($row["login"] != $_SESSION['login'])
                            echo '<td><a href="crud/delete-contact.php?tkid='.$row["tkid"].'">Usuń</a></td>'; 
            ?>
        </tr>
        <?php
            $i++;
            } 
        ?>
    </table>
</body>