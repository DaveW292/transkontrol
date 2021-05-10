<?php include "validation/grafik.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <a href="kontakty"><h2>Kontakty</h2></a>
    <a href="aktualnosci"><h2>Aktualności</h2></a>
    <h2>Grafik</h2>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";

        if ($currentRole->num_rows > 0) {
                while($row = $currentRole->fetch_assoc()) {
                  $myRole = $row["role"];
                  global $myRole;
                }
              }

        if($myRole == "admin") {
            echo '<a href="crud/create-schedule">NOWY GRAFIK</a>';

            error_reporting(0);
            //Zapamiętaj wprowadzone dane
            $table = $_GET['table'];
            $community = $_GET['community'];
            include 'crud/update-schedule.php';
        }
    ?>
<br>

<form action="grafik" method="post">
    Wybierz zakres jednego tygodnia od poniedziałku do niedzieli <br>
    <input type="date" value=<?php
        $dates = split ("\_", $newestTable); 
        $newestDateStart = substr($dates[0],0,4).'-'.substr($dates[0],4,2).'-'.substr($dates[0],6,2);
        if(!isset($dateStart) || $dateStart=='') echo $newestDateStart;
        else echo $dateStart;
    ?> name="dateStart">

    <input type="date" value=<?php
        $dates = split ("\_", $newestTable); 
        $newestDateEnd = substr($dates[1],0,4).'-'.substr($dates[1],4,2).'-'.substr($dates[1],6,2);
        if(!isset($dateStart) || $dateStart=='') echo $newestDateEnd;
        else echo $dateStart;
    ?> name="dateEnd">
    <input type="submit" value="Wyświetl">

</form>

<br>
<table border = "1px, solid, black">
    <tr>
        <td rowspan = "2">Przewoźnik</td>
        <td colspan = "2">Poniedziałek</td>
        <td colspan = "2">Wtorek</td>
        <td colspan = "2">Środa</td>
        <td colspan = "2">Czwartek</td>
        <td colspan = "2">Piątek</td>
        <td colspan = "2">Sobota</td>
        <td colspan = "2">Niedziela</td>
    </tr>
    <tr>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
        <td>06:00 - 14:00</td>
        <td>14:00 - 22:00</td>
    </tr>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
    ?>
    <tr>
        <td><?php echo $row["carrier"]; ?></td>
        <td><?php echo $row["monday1"]; ?></td>
        <td><?php echo $row["monday2"]; ?></td>
        <td><?php echo $row["tuesday1"]; ?></td>
        <td><?php echo $row["tuesday2"]; ?></td>
        <td><?php echo $row["wednesday1"]; ?></td>
        <td><?php echo $row["wednesday2"]; ?></td>
        <td><?php echo $row["thursday1"]; ?></td>
        <td><?php echo $row["thursday2"]; ?></td>
        <td><?php echo $row["friday1"]; ?></td>
        <td><?php echo $row["friday2"]; ?></td>
        <td><?php echo $row["saturday1"]; ?></td>
        <td><?php echo $row["saturday2"]; ?></td>
        <td><?php echo $row["sunday1"]; ?></td>
        <td><?php echo $row["sunday2"]; ?></td>
    </tr>
    <?php
            $i++;
        }
    ?>
</table>
</body>

<!-- INSERT INTO `210503` (`carrier`, `monday1`, `monday2`, `tuesday1`, `tuesday2`, `wednesday1`, `wednesday2`, `thursday1`, `thursday2`, `friday1`, `friday2`, `saturday1`, `saturday2`, `sunday1`, `sunday2`) VALUES ('Rokbus (Rokietnica)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''); -->

<!-- UPDATE `210503` SET `monday1` = '3\r\n4', `wednesday1` = 'ZAKAZ' WHERE `210503`.`id` = 1;  -->