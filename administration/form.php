<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj.php');
        exit();
    }
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date">
  <select name="employee">
    <option>Jan Kowalski</option>
    <option>Piotr Nowak</option>
  </select>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
