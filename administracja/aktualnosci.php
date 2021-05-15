<?php include "validation/aktualnosci.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="../styles/panel.css">
</head>
<body>
    <nav>
        <a href="kontakty"><h2>Kontakty</h2></a>
        <h2>Aktualności</h2>
        <a href="grafik"><h2>Grafik</h2></a>
        <a href="dyspozycyjnosc"><h2>Dyspozycyjność</h2></a>
    </nav>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";
        if($currentRole == "admin")
        {
            echo '
                <form action="aktualnosci" method="post">
                    <fieldset>
                        <legend>Dodaj aktualność</legend>
                        <input type="hidden" value="'.date("Y-m-d H:i").'" name="date">
                        <input type="hidden" value="'.$_SESSION['login'].'" name="author">
                        <textarea name="contents" required"></textarea>
                        <input type="submit" value="DODAJ">
                    </fieldset>
                </form>
            ';
        }
    ?>
<br>
<table border= "1px, solid, black">
	<tr>
        <td>Data dodania</td>
        <td>Autor</td>
        <td>Treść</td>
        <?php if($currentRole == "admin") echo "<td>Akcja</td>"; ?>
	</tr>
	<?php
        $i=0;
        while($row = mysqli_fetch_array($display)) {
	?>
	<tr>
        <td><?php echo $row["date_time"]; ?></td>
        <td><?php echo $row["author"]; ?></td>
        <td><?php echo $row["contents"]; ?></td>
        <?php if($currentRole == "admin") echo '<td><a href="crud/delete-news.php?id='.$row["id"].'">Usuń</a></td>'; ?>
	</tr>
	<?php
        $i++;
        }
	?>
</table>
</body>