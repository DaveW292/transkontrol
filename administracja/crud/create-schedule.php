<?php
        if($myRole == "admin")
        {
            echo '
                <form action="grafik" method="post">
                    <fieldset>
                        <legend>Dodaj grafik</legend>
                        <input type="text" name="tkid" required>
                        <input type="text" name="name" required>
                        <input type="text" name="phone" required>
                        <input type="text" name="login" required>
                        <input type="password" name="password" required>
                        <select name="role">
                            <option>user</option>
                            <option>admin</option>
                        </select>
                        <input type="submit" value="DODAJ" name="add">
                        <input type="submit" value="EDYTUJ" name="edit">
                    </fieldset>
                </form>
            ';
        }
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
