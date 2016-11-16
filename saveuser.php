<?php
session_start();
require_once('config/config.php');
require_once('functions/functions.php');
SSLon();
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>Registering complete</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body>
    
    <main id="saveuser">
        <?php        
        $userdata = unserialize($_SESSION['userinfo']);
        
   try {
        $email = $userdata["Email"];
        $check_email = $DBH->prepare('SELECT Email FROM Users WHERE Email=:user_email');
        $check_email->bindValue(':user_email', $email, PDO::PARAM_STR);
        $check_email->execute();
        $result = $check_email->rowCount();
        if ($result < 0) {
            $options = ['cost' => 8,];    //Password hashing options     
            $userdata["Upassword"]=password_hash($userdata["Upassword"],PASSWORD_BCRYPT, $options);
            
        try {
            $sql = $DBH->prepare("INSERT INTO 
            Users (Username,Email,Upassword)
            VALUES
            (:Username,:Email,:Upassword);");    
        if($sql->execute($userdata)){
            try {                
                $sql = "SELECT * FROM Users WHERE Id = ".$DBH->lastInsertId().";";
					$STH3 = $DBH->query($sql);
					$STH3->setFetchMode(PDO::FETCH_OBJ);
					$user = $STH3->fetch();
					$_SESSION["loggedin"] = true;
					$_SESSION["Username"] = $user->Username;
                    $_SESSION["Email"] = $user->Email;
                    $_SESSION["Joindate"] = $user->Joindate; //!!!!!!!!!
            
                    unset($_SESSION["userinfo"]);
                
            echo ("<p>Username: ".$_SESSION["Username"]."<br/> 
            Email: ".$_SESSION["Email"]."<br/>
            Joindate: ".$_SESSION["Joindate"]."</p>"); //TESTITULOSTUS  
                
                    echo ("<p>Your registration is complete. The button below takes you to your profile.</p>");
                    echo ("<a href='profile.php'><button type='button'>Home feed</button></a>");
                    }catch(PDOException $e){
                        echo ("Error fetching information");
                    }
            }
        }catch(PDOException $e){
        echo ("Error inserting information");
        }

    } else {
        echo 'User already exists';
        }
    
    }catch(PDOException $e){
        echo ("database error");
    } ?>
    </main>

    </body>
</html>