<?php include "validation/aktualnosci.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <a href="kontakty"><h2>Kontakty</h2></a>
    <h2>Aktualnosci</h2>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";
        include "crud/create-news.php";
    ?>
<br>
<table border= "1px, solid, black">
	<tr>
        <td>Data dodania</td>
        <td>Autor</td>
        <td>Treść</td>
        <?php if($_SESSION['login'] == $admin) echo "<td>Akcja</td>"; ?>
	</tr>
	<?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
	?>
	<tr>
        <td><?php echo $row["date_time"]; ?></td>
        <td><?php echo $row["author"]; ?></td>
        <td><?php echo $row["contents"]; ?></td>
        <?php if($_SESSION['login'] == $admin) echo '<td><a href="crud/delete-news.php?id='.$row["id"].'">Usuń</a></td>'; ?>
	</tr>
	<?php
        $i++;
        }
	?>
</table>
</body>