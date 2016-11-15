<?php
session_start();
require_once('config/config.php');
require_once('functions/functions.php');
SSLon();
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Confirm information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
<?php
$userdata = unserialize($_SESSION['userinfo']);
?>
    <main id="confirminfo">
    <?php
        echo "<p>Username:<br/>".$userdata["Username"]."</p>";
        echo "<p>Email:<br/>".$userdata["Email"]."</p>";
?>
    <p>Check your information</p>
    <a href="saveuser.php"><button>Register account</button></a>
    <a href="register.php"><button>Change information</button></a>
    
    </main>
    </body>
</html>