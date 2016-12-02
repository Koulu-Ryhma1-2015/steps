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
    
<body id="index">
    
<?php
if($_SESSION['loggedin']){
     redirect('profile.php?Id='.$_SESSION['id']);
 } 
    
?>
    
<main class="center">
<header id="indexheader">
<sub>do create &amp; share</sub> create.it
</header>
    

<ul id="loginbox">
    <li id="login" class="loginbox_li">Log in</li>
    <li id="loginform">
    <form method="POST" action="login.php">
        <input type="text" name="email" id="email" placeholder="Email" required><br/>
        <input type="password" name="pwd" id="pwd" placeholder="Password" required><br/>
        <input type="submit" name="login" value="Log in">
    </form>
    </li>


    <li class="loginbox_li"><a href="register.php">Register</a></li>
</ul>
    </main>

<script src="js/menu.js"></script>
</body>
</html>