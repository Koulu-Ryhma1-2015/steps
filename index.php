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
    
<?php
if($_SESSION['loggedin']){
     redirect('profile.php?Id='.$_SESSION['id']);
 } 
    
?>
    
<main class="center">
<header>
Hieno kuva
</header>
    

<div id="loginbox">
<p id="login">Log in</p>
    <form method="POST" action="login.php" id="loginform">
        <input type="text" name="email" id="email" placeholder="Email" required><br/>
        <input type="password" name="pwd" id="pwd" placeholder="Password" required><br/>
        <input type="submit" name="login" value="Log in">
    </form>
</div>

<div id="register">
<a href="register.php">Register</a>
</div>
    </main>

<script src="js/menu.js"></script>
</body>
</html>