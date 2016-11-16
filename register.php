<?php
session_start();
require_once('config/config.php');
require_once('functions/functions.php');
SSLon();
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Register new user</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
        
<script>
function validate(){
    var n1 = document.getElementById("pw1");
    var n2 = document.getElementById("pw2");
        if(n1.value!="" && n2.value!=""){
            if(n1.value == n2.value){
                return true;
            }
        }
        var errorDiv = document.getElementById("errors");
        errorDiv.innerHTML=("Passwords don't match.");
        return false;        
}

function validateEmail(){  
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    var email = document.getElementById("email");
    if(email.value.match(mailformat)) {  
        return true;  
    }  
    else {  
        var errorDiv = document.getElementById("errors");
        errorDiv.innerHTML=("Invalid email address");
        return false;  
    }  
}  
</script>
    </head>
<?php 
include_once("config/config.php");
if(isset($_POST["submit"])){
        $data = $_POST["data"];
        $email = $data["Email"];
       
        $check_email = $DBH->prepare('SELECT Email FROM Users WHERE Email=:user_email');
        $check_email->bindValue(':user_email', $email, PDO::PARAM_STR);
        $check_email->execute();
        $result = $check_email->rowCount();
        if ($result > 0) {
           echo "Someone with that email already exists.";         
        } else {
	       //Laitetaan syötetyt tiedot sessioon jemmaan, jotta voidaan palata muuttamaan annettuja arvoja
	       $_SESSION['userinfo'] = serialize($data);
          ?>
        <script>window.location.href="confirm.php";</script>
    <?php
        }
    }
?>
    
<body>


<main id="register">
    <p>Sign up</p>
    <form onsubmit="return validate() && validateEmail()" method="POST" action="register.php">
     <?php    
        if(isset($_SESSION["userinfo"])){
            $userinfo = unserialize($_SESSION["userinfo"]); ?>
            <input type="text" name="data[Username]" value="<?php echo $userinfo["Username"]; ?>" required><br/>
            <input type="text" name="data[Email]" id="email" value="<?php echo $userinfo["Email"]; ?>" required><br/>
            <input type="text" name="data[Upassword]" id="pw1" value="<?php echo $userinfo["Upassword"]; ?>" required>
            <input type="text" name="Upassword_again" id="pw2" value="<?php echo $userinfo["Upassword"]; ?>" required><br/>
        <?php
        } else { ?>
            <input type="text" name="data[Username]" placeholder="Username" required><br/>
            <input type="text" name="data[Email]" id="email" placeholder="Email" required><br/>
            <input type="text" name="data[Upassword]" id="pw1" placeholder="Password" required>
            <input type="text" name="Upassword_again" id="pw2" placeholder="Password again" required><br/>
       <?php } ?>
    <input type="submit" name="submit" value="Register">
    </form>
    <div id="errors"></div>
</main>
    
    

</body>
</html>