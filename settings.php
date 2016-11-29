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
    Select avatar to upload:
    <input type="hidden" name="it" value="avatar"> 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
    
<form action="uploadcheck.php" method="post" enctype="multipart/form-data">
    Select banner to upload:
    <input type="hidden" name="it" value="banner"> 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</main>

<script src="js/menu.js"></script>
</body>
</html>