<?php
require_once "redirects/admin-login.php";
    if($_SESSION['login'] == $admin)
    {
        echo '
            <form action="aktualnosci" method="post">
                <fieldset>
                    <legend>Dodaj aktualność</legend>
                    <input type="hidden" value="'.date("Y-m-d H:i").'" name="date">
                    <input type="hidden" value="'.$admin.'" name="author">
                    <textarea name="contents" required"></textarea>
                    <input type="submit" value="DODAJ">
                </fieldset>
            </form>
        ';
    }
?>
