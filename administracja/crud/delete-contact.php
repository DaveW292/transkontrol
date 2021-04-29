<?php
    include_once '../redirects/db-management.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    $sql = "DELETE FROM users WHERE tkid='" . $_GET["tkid"] . "'";
    if (mysqli_query($conn, $sql))
    {
        // echo "Record deleted successfully";
        header('Location: ../kontakty');
        exit();
    } 
    else echo "Error deleting record: " . mysqli_error($conn);
    
    mysqli_close($conn);
?>