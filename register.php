<?php
session_start();
include('header.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Register new user</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
<?php // Check if email address already exists

if(isset($_POST["submit"])){
        $data = $_POST["data"];
        $email = $data["Email"];
       
        $check_email = $DBH->prepare('SELECT Email FROM a_Users WHERE Email=:user_email');
        $check_email->bindValue(':user_email', $email, PDO::PARAM_STR);
        $check_email->execute();
        $result = $check_email->rowCount();
        if ($result > 0) {
           echo "<div class='center'>Someone with that email already exists.</div>";         
        } else {
	       $_SESSION['userinfo'] = serialize($data);?>
        <script>window.location.href='confirm.php';</script>
        <?php }
    }
?>
    
<body>

<main id="register">
    <p>Sign up</p>
    <form method="POST" action="register.php">
     <?php    
        if(isset($_SESSION["userinfo"])){
            $userinfo = unserialize($_SESSION["userinfo"]); ?>
            <input type="text" name="data[Username]" value="<?php echo $userinfo["Username"]; ?>" pattern="^[0-9a-zA-Z]+$" required><br/>
            <input type="text" name="data[Email]" id="email" value="<?php echo $userinfo["Email"]; ?>" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required><br/>
            <input type="password" name="data[UPassword]" id="pw1" required>
            <input type="password" name="Upassword_again" id="pw2" required><br/>
        <?php
        } else { ?>
            <input type="text" name="data[Username]" placeholder="Username" pattern="^[0-9a-zA-Z]+$" required><br/>
            <input type="text" name="data[Email]" id="email" placeholder="Email" pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" required><br/>
            <input type="password" name="data[UPassword]" id="pw1" placeholder="Password" required>
            <input type="password" name="Upassword_again" id="pw2" placeholder="Password again" required><br/>
       <?php } ?>
    <input type="submit" name="submit" value="Register">
    </form>
    <div id="errors"></div>
</main>
    
<script src="js/userfunctions.js"></script> 
    
    
</body>
</html>