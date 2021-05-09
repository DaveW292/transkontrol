<?php

    include_once '../redirects/db-schedules.php';
    $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$connection) die('Could not Connect My Sql:');
?>

<form action="grafik" method="post">

    <select name = "table">
        <?php
            include_once 'redirects/show-tables.php';
            $num_rows = mysql_num_rows($showTables);
            for ($i = 0; $i < $num_rows; $i++) {
                echo "<option>", mysql_tablename($showTables, $i), "</option>";
            }
            mysql_free_result($showTables);
        ?>
    </select>

<input type="submit" value="Przetwórz">
</form>
