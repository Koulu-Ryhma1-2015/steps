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
$email = $userdata["Email"];
$username = $userdata["Username"];
        
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Check email
	  	 if(preg_match("/^[a-öA-Ö ]*$/",$username)) { //Check username
		    echo "<main id='confirminfo'>";
            echo "<p>Username:<br/>".$userdata["Username"]."</p>";
            echo "<p>Email:<br/>".$userdata["Email"]."</p>";
            echo "<p>Check your information</p>";
            echo "<a href='saveuser.php'><button>Register account</button></a>";
            echo "<a href='register.php'><button>Change information</button></a>";
            echo "</main>";
	  	 }else {
		    echo("<div class='regError'>Only letters and spaces allowed in username: <br />"
		          .$userdata['Username']);
            echo "<a href='register.php'><button>Change information</button></a>
            </div>";
	  	 }
	}else{
	  	    echo("<div class='regError'>Illegal email-address: <p>"
	  	    .$userdata['Email']); 
            echo "<a href='register.php'><button>Change information</button></a>
            </div>";
	}  
?>


    
    </body>
</html>