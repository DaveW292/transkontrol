<?php
require_once "redirects/admin-login.php";
        if($_SESSION['login'] == $admin)
        {
            echo '
                <form action="kontakty" method="post">
                    <fieldset>
                        <legend>Dodaj kontakt</legend>
                        <input type="text" name="tkid">
                        <input type="text" name="name">
                        <input type="text" name="phone">
                        <input type="submit" value="DODAJ">
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
?>
