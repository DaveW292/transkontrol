<?php include "validation/kontakty.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <h2>Kontakty</h2>
    <a href="aktualnosci"><h2>Aktualnosci</h2></a>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";
        include "crud/create-contact.php";
    ?>
<br>
<table border= "1px, solid, black">
	<tr>
        <td>Numer służbowy</td>
        <td>Imię</td>
        <td>Numer telefonu</td>
        <?php if($_SESSION['login'] == $admin) echo "<td>Akcja</td>"; ?>
	</tr>
	<?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
	?>
	<tr>
        <td><?php echo $row["tkid"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <?php if($_SESSION['login'] == $admin) echo '<td><a href="crud/delete-contact.php?id='.$row["id"].'">Usuń</a></td>'; ?>
	</tr>
	<?php
        $i++;
        }
	?>
</table>
</body>