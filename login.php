<?php
session_start();
include('header.php');
include('config/userphp.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
    
    <main class="center">
    <?php 
    if(isset($_POST['login'])){ //Check if user has entered the page after typing in login information elsewhere, like index.php
        if(login($_POST['email'],$_POST['pwd'],$DBH)){
            echo("<br> Welcome ".$_SESSION['username']);
            echo("<br><a href='main.php'><button>Home page</button></a>");
        };
        
        
    }
    ?>    
    
    
    </main>
    
    </body>
</html>