<?php
    include_once '../redirects/connect.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    $sql = "DELETE FROM news WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) 
    {
        // echo "Record deleted successfully";
        header('Location: ../aktualnosci');
        exit();
    } 
    else echo "Error deleting record: " . mysqli_error($conn);
    
    mysqli_close($conn);
?>