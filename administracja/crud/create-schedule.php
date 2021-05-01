<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: ../zaloguj');
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
    $r = 1;

    if(isset($_POST['dateStart']) && isset($_POST['dateEnd']))
    {
        $everything_OK=true;

        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd'];
        $carrier = $_POST['carrier'];
        $z = 0;
        for($x = 1; $x < sizeof($shifts); $x++)
        {
            for($y = 1; $y < sizeof($carriers); $y++)
            {
                $zmiany[$z] = $_POST[$y.$shifts[$x]."a"];
                $z++;
                $zmiany[$z] = $_POST[$y.$shifts[$x]."b"];
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
                $result = $connection->query("SELECT tkid FROM users WHERE tkid='$tkid'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tkids = $result->num_rows;
                if($how_many_tkids>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_tkid']="Podany numer służbowy jest już w bazie!";
                }

                //czy numer telefonu juz isnieje?
                $result = $connection->query("SELECT tkid FROM users WHERE phone='$phone'");
                if(!$result) throw new Exception($connection->error);
            
                $how_many_phones = $result->num_rows;
                if($how_many_phones>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_phone']="Podany numer telefonu jest już w bazie!";
                }

                //czy login juz isnieje?
                $result = $connection->query("SELECT tkid FROM users WHERE login='$login'");
                if(!$result) throw new Exception($connection->error);
                
                $how_many_logins = $result->num_rows;
                if($how_many_logins>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_login']="Podany login jest już w bazie!";
                }

                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    #sql query to insert into database
                    $sql = "INSERT INTO users VALUES('$tkid', '$name', '$phone', '$login', '$password', '$role')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: kontakty');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
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
    include_once '../redirects/db-schedules.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn) die('Could not Connect My Sql:');
    $result = mysqli_query($conn, "SELECT * FROM test");
    $conn->close();

    include_once '../redirects/db-management.php';
    $conn2=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn2) die('Could not Connect My Sql:');
    $login = $_SESSION['login'];
    $currentRole = mysqli_query($conn2, "SELECT role FROM users WHERE login='$login'");
    $conn2->close();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <a href="../grafik"><h2>POWRÓT</h2></a>
    <?php
        if ($currentRole->num_rows > 0) {
                while($row = $currentRole->fetch_assoc()) {
                  $myRole = $row["role"];
                  global $myRole;
                }
              }

        if($myRole == "admin") {
            echo '<a href="crud/create-schedule">NOWY GRAFIK</a>';
        }
?>

<?php

    include_once '../redirects/db-management.php';
    $conn3=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn3) die('Could not Connect My Sql:');

    if($myRole == "admin")
    { ?>
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
                    <select name = <?php echo $r.$shifts[$i]."a"; ?>>
                        <option></option>
                        <?php 
                            $tkid = mysqli_query($conn3, "SELECT tkid FROM users WHERE role = 'user'");
                            if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        ?>
                        <option>ZAKAZ</option>
                    </select>
                    <select name = <?php echo $r.$shifts[$i]."b"; $i++; ?>>
                        <option></option>
                        <?php 
                            $tkid = mysqli_query($conn3, "SELECT tkid FROM users WHERE role = 'user'");
                            if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        ?>
                        <option>ZAKAZ</option>
                    </select>
                </td><?php } ?>
            </tr><?php $r++; } ?>
        </table>
        <input type="submit" value="DODAJ">
    </form>
<?php } ?>
</body>
