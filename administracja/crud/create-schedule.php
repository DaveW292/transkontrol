<?php
    include_once 'redirects/db-management.php';
    $conn3=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn3) die('Could not Connect My Sql:');

    if($myRole == "admin")
    {
        echo '
            <form action="grafik" method="post">
                <fieldset>
                    <legend>Dodaj grafik</legend>
                    <input type="date" name="dateStart">
                    <input type="date" name="dateEnd">
                    <select name="carrier">
                        <option>Rokbus (Rokietnica)</option>
                        <option>ZKP Suchy Las</option>
                        <option>Transkom (Murowana Goślina, Czerwonak)</option>
                        <option>PUK Komorniki</option>
                        <option>PUK Dopiewo</option>
                        <option>Warbus (Oborniki)</option>
                        <option>Marco Polo</option>
                        <option>PKS Poznań</option>
                    </select>';

                    $days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
                    $shifts = array("monday1a", "monday1b", "monday2a", "monday2b",
                                  "tuesday1a", "tuesday1b", "tuesday2a", "tuesday2b",
                                  "wednesday1a", "wednesday1b", "wednesday2a", "wednesday2b",
                                  "thursday1a", "thursday1b", "thursday2a", "thursday2b",
                                  "friday1a", "friday1b", "friday2a", "friday2b",
                                  "saturday1a", "saturday1b", "saturday2a", "saturday2b",
                                  "sunday1a", "sunday1b", "sunday2a", "sunday2b");
                    $y = 0;

                    for ($x = 0; $x < 7; $x++)
                    {
                        echo '<fieldset><legend>'.$days[$x].'</legend>';
                        echo '06:00 - 14:00<select name="'.$shifts[$y].'"><option></option>';
                        $tkid = mysqli_query($conn3, "SELECT tkid FROM users");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        echo '<option>ZAKAZ</option></select>';
                        $y++;
                        echo '<select name="'.$shifts[$y].'"><option></option>';
                        $tkid = mysqli_query($conn3, "SELECT tkid FROM users");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        echo '<option>ZAKAZ</option></select>';
                        $y++;
                        echo '14:00 - 22:00<select name="'.$shifts[$y].'"><option></option>';
                        $tkid = mysqli_query($conn3, "SELECT tkid FROM users");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        echo '<option>ZAKAZ</option></select>';
                        $y++;
                        echo '<select name="'.$shifts[$y].'"><option></option>';
                        $tkid = mysqli_query($conn3, "SELECT tkid FROM users");
                        if ($tkid->num_rows > 0) while($row = $tkid->fetch_assoc()) echo '<option>'.$row["tkid"].'</option>';
                        echo '<option>ZAKAZ</option></select>';
                        echo '</fieldset>';
                        $y++;
                    }
                    $conn3->close();
        echo '      
                    <input type="submit" value="DODAJ">
                </fieldset>
            </form>';
    }
?>
