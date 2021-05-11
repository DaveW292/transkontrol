<?php include "validation/grafik.php"; ?>
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
        <a href="aktualnosci"><h2>Aktualności</h2></a>
        <h2>Grafik</h2>
        <a href="dyspozycyjnosc"><h2>Dyspozycyjność</h2></a>
    </nav>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";

        if ($currentRole->num_rows > 0) 
        {
            while($row = $currentRole->fetch_assoc()) 
            {
                $myRole = $row["role"];
                global $myRole;
            }
        }

        if ($currentTkid->num_rows > 0)
        {
            while($row = $currentTkid->fetch_assoc()) 
            {
                $myTkid = $row["tkid"];
                global $myTkid;
            }
        }

        if($myRole == "admin") 
        {
            error_reporting(0);
            echo '<a href="crud/create-schedule">NOWY GRAFIK</a>';
    ?>
            <!-- usuwanie tabeli -->
            <fieldset>
                <legend>Usuń grafik</legend>
                <form action="grafik" method="post">
                    Wybierz zakres jednego tygodnia od poniedziałku do niedzieli <br>
                    <input type="date" name="dateStartDelete">
                    <input type="date" name="dateEndDelete">
                    <input type="submit" value="USUŃ">
                </form>
            </fieldset>
       <?php } ?>
    <!-- wybranie tabeli -->
    <fieldset>
        <legend>Wyświetl grafik</legend>
        <form action="grafik" method="post">
            Wybierz zakres jednego tygodnia od poniedziałku do niedzieli <br>
            <input type="date" value=<?php
                $dates = split ("\_", $newestTable); 
                $newestDateStart = substr($dates[0],0,4).'-'.substr($dates[0],4,2).'-'.substr($dates[0],6,2);
                if(isset($dateStartUpdate)) echo $dateStartUpdate;
                else if(!isset($dateStart) || $dateStart=='') echo $newestDateStart;
                else echo $dateStart;
            ?> name="dateStart">

            <input type="date" value=<?php
                $dates = split ("\_", $newestTable); 
                $newestDateEnd = substr($dates[1],0,4).'-'.substr($dates[1],4,2).'-'.substr($dates[1],6,2);
                if(isset($dateEndUpdate)) echo $dateEndUpdate;
                else if(!isset($dateEnd) || $dateEnd=='') echo $newestDateEnd;
                else echo $dateEnd;
            ?> name="dateEnd">
            <input type="submit" value="WYŚWIETL">
        </form>
        <!-- aktualizacja tabeli -->
        <?php if($myRole == "admin") { ?>
        <fieldset>
            <legend>Aktualizuj grafik</legend>
            <form action="grafik" method="post">
                <input type="hidden" value=<?php
                    $dates = split ("\_", $newestTable); 
                    $newestDateStart = substr($dates[0],0,4).'-'.substr($dates[0],4,2).'-'.substr($dates[0],6,2);
                    if(!isset($dateStart) || $dateStart=='') echo $newestDateStart;
                    else echo $dateStart;
                ?> name="dateStartUpdate">
                <input type="hidden" value=<?php
                    $dates = split ("\_", $newestTable); 
                    $newestDateEnd = substr($dates[1],0,4).'-'.substr($dates[1],4,2).'-'.substr($dates[1],6,2);
                    if(!isset($dateEnd) || $dateEnd=='') echo $newestDateEnd;
                    else echo $dateEnd;
                ?> name="dateEndUpdate">

                <select name="day"><?php for($x = 0; $x < sizeof($days); $x++) echo '<option value="'.$daysEn[$x].'">'.$days[$x].'</option>'; ?></select>
                
                <input type="radio" id="1" name="hour" value="1">
                <label for="1">06:00 - 14:00</label><br>
                <input type="radio" id="2" name="hour" value="2">
                <label for="2">14:00 - 22:00</label><br>

                <select name="carrier"><?php for($x = 0; $x < sizeof($carriers); $x++) echo '<option>'.$carriers[$x].'</option>'; ?></select>

                <?php
                    include_once '../redirects/db-management.php';
                    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
                    if(!$connection) die('Could not Connect My Sql:');
                ?>
                <select name = "UnitA">
                    <option></option>
                    <?php 
                        $tkid = mysqli_query($connection, "SELECT tkid FROM users WHERE role = 'user'");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                    ?>
                    <option>ZAKAZ</option>
                </select>
                <select name = "UnitB">
                    <option></option>
                    <?php 
                        $tkid = mysqli_query($connection, "SELECT tkid FROM users WHERE role = 'user'");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                    ?>
                </select>

                <input type="submit" value="AKTUALIZUJ">
            </form>
            <?php } ?>
            <!-- wyświetlanie tabeli -->
            <table border = "1px, solid, black">
                <tr>
                    <td rowspan = "2">Przewoźnik</td>
                    <?php for($x = 0; $x < sizeof($days); $x++) {?>
                        <td colspan = "2"><?php echo $days[$x]; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <?php for($x = 0; $x < 7; $x++) {?>
                        <td>06:00 - 14:00</td>
                        <td>14:00 - 22:00</td>
                    <?php } ?>
                </tr>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                <tr>
                    <td><?php echo $row["carrier"]; ?></td>
                    <?php
                        if($myRole == "admin") 
                            for($x = 0; $x < sizeof($shifts); $x++) 
                                echo '<td>'.$row[$shifts[$x]].'</td>';
                        else
                            for($x = 0; $x < sizeof($shifts); $x++)
                            if(strpos($row[$shifts[$x]], $myTkid) !== false || strpos($row[$shifts[$x]], 'ZAKAZ') !== false)
                            {
                                echo '<td>'.$row[$shifts[$x]].'</td>';
                            }
                            else echo '<td> - </td>';
                    ?>
                </tr>
                <?php
                        $i++;
                    }
                ?>
            </table>
            <?php if($myRole == "admin") { ?>
        </fieldset>
        <?php } ?>
    </fieldset>
</body>
