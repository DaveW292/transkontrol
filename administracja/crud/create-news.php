<?php
    if($myRole == "admin")
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
