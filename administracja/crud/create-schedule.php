<?php
    session_start();

    include_once '../redirects/db-management.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Nie można połączyć się z bazą!');

    $login = $_SESSION['login'];
    $currentRole = mysqli_query($connection, "SELECT role FROM users WHERE login='$login'");
    $connection->close();

    if ($currentRole->num_rows > 0) {
        while($row = $currentRole->fetch_assoc()) {
          $myRole = $row["role"];
          global $myRole;
        }
      }

    if(!isset($_SESSION['logged']) || $myRole != "admin")
    {
        header('Location: ../');
        exit();
    }

    $days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");

    $carriers = array("Rokbus (Rokietnica)", "ZKP Suchy Las", "Transkom (Murowana Goślina, Czerwonak)", "PUK Komorniki",
                      "PUK Dopiewo", "Warbus (Oborniki)", "Marco Polo", "PKS Poznań");

    $shifts = array("monday1", "monday2",
                    "tuesday1", "tuesday2",
                    "wednesday1", "wednesday2",
                    "thursday1", "thursday2",
                    "friday1", "friday2",
                    "saturday1", "saturday2",
                    "sunday1", "sunday2");
    $r = 0;

    if(isset($_POST['dateStart']) && isset($_POST['dateEnd']))
    {
        $everything_OK=true;

        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $z = 0;
        for($x = 0; $x < sizeof($carriers); $x++)
        {
            $carrier[$x] = $_POST['carrier'.$x];
            for($y = 0; $y < sizeof($shifts); $y++)
            {
                $teams[$z] = $_POST[$shifts[$y]."a".$x]." - ".$_POST[$shifts[$y]."b".$x];
                $z++;
            }
        }

        require_once "../redirects/db-schedules.php";
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
                //czy numer sluzbowy juz isnieje?
                // $result = $connection->query("SELECT tkid FROM users WHERE tkid='$tkid'");
                // if(!$result) throw new Exception($connection->error);

                // $how_many_tkids = $result->num_rows;
                // if($how_many_tkids>0)
                // {
                //     $everything_OK=false;
                //     $_SESSION['e_tkid']="Podany numer służbowy jest już w bazie!";
                // }


                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    //Utwórz tabelę i dodaj kolumny
                    $tmpTableName = $dateStart."_".$dateEnd;
                    $tableName = str_replace("-","",$tmpTableName);
                    for($x = 0; $x < sizeof($shifts); $x++) $columns .= $shifts[$x]." VARCHAR(5),";

                    $query = "CREATE TABLE $tableName (
                        id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                        carrier TEXT,"
                        .$columns.
                        "PRIMARY KEY (id)
                        )";

                    if(mysqli_query($connection, $query)) $_SESSION['sent']=true;
                    else throw new Exception($connection->error);

                    // Dodaj wiersze
                    $z = 0;
                    for($y=0; $y < sizeof($carriers); $y++)
                    {
                        $values .= "('".$carriers[$y]."', ";
                        for($x=0; $x < sizeof($shifts); $x++)
                        {
                            if($x + 1 == sizeof($shifts)) $values .= "'".$teams[$z]."')";
                            else $values .= "'".$teams[$z]."', ";
                            $z++;
                        }
                        if($y + 1 != sizeof($carriers)) $values .= ",";
                    }

                    $query = "INSERT INTO $tableName (carrier, ".implode(", ", $shifts).") VALUES".$values;

                    if(mysqli_query($connection, $query)) 
                    {
                        $_SESSION['sent'] = true;
                        header('Location: ../grafik');
                    }
                    else throw new Exception($connection -> error);
                }        
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
    include_once '../redirects/db-management.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Could not Connect My Sql:');
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <a href="../grafik"><h2>POWRÓT</h2></a>
    <form method="post" enctype="multipart/form-data">
        <input type="date" name="dateStart">
        <input type="date" name="dateEnd">
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
            <?php for($x = 0; $x < sizeof($carriers); $x++) { $i = 0; ?>
            <input type="hidden" name=<?php echo "carrier".$x;?> value="<?php echo $carriers[$x];?>">
            <tr>
                <td><?php echo $carriers[$x];?></td>
                <?php for($y = 0; $y < sizeof($shifts); $y++) {?>
                <td>
                    <select name = <?php echo $shifts[$i]."a".$r; ?>>
                        <option></option>
                        <?php 
                            $tkid = mysqli_query($connection, "SELECT tkid FROM users WHERE role = 'user'");
                            if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        ?>
                        <option>ZAKAZ</option>
                    </select>
                    <select name = <?php echo $shifts[$i]."b".$r; $i++; ?>>
                        <option></option>
                        <?php 
                            $tkid = mysqli_query($connection, "SELECT tkid FROM users WHERE role = 'user'");
                            if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        ?>
                    </select>
                </td><?php } ?>
            </tr><?php $r++; } $connection->close(); ?>
        </table>
        <input type="submit" value="DODAJ">
    </form>
</body>
