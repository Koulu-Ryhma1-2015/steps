<?php 
session_start();
include('header.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
<body>
  
<main>    
<form action="uploadcheck.php" method="post" enctype="multipart/form-data">
    <p>New file upload</p>
    <input type="hidden" name="it" value="upload"> 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    Title:
    <br>
    <input type="text" name="data[UploadName]" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required><br>
    Description:<br>
    <input type="text" name="data[Description]" required>
    <br>
    <input type="submit" value="Upload Image" name="submit">
</form>
</main>
    
<script src="js/menu.js"></script>
</body>
</html>