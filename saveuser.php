<?php
session_start();
include('header.php');
include('password/lib/password.php');
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

    
        $options = ['cost' => 8,];     
      
        $userdata = unserialize($_SESSION['userinfo']);
        $userdata["UPassword"]=password_hash($userdata["UPassword"], PASSWORD_BCRYPT, $options);
        
        function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
        }
        $date = date('Y-m-d');
        $avatar = 'defaultavatar.jpg';
        $userdata = array_push_assoc($userdata,'Joindate', $date);
        $userdata = array_push_assoc($userdata,'Avatar', $avatar);

        if(filter_var($userdata["Email"], FILTER_VALIDATE_EMAIL)){

            if(preg_match("/^[a-öA-Ö ]*$/",$userdata['Username'])) {

            try {

                $sql = $DBH->prepare("INSERT INTO 
                a_Users (Username,Email,UPassword, Joindate,Avatar)
                VALUES
                (:Username,:Email,:UPassword, :Joindate,:Avatar);");    
            if($sql->execute($userdata)){
                try {   
 
                    $sql = "SELECT * FROM a_Users WHERE Id = ".$DBH->lastInsertId().";";
					   $STH3 = $DBH->query($sql);
					   $STH3->setFetchMode(PDO::FETCH_OBJ);
					   $user = $STH3->fetch();
					   $_SESSION["loggedin"] = true;
					   $_SESSION["username"] = $user->Username;
                       $_SESSION["email"] = $user->Email;
                       $_SESSION["joindate"] = $user->Joindate; //!!!!!!!!!
                        $_SESSION["avatar"] = $user->Avatar;
                    
                       unset($_SESSION['userinfo']);
                
                       echo ("<p>Username: ".$_SESSION["username"]."<br/> 
                       Email: ".$_SESSION["email"]."<br/>
                       Joindate: ".$_SESSION["joindate"]."</p>"); //TESTITULOSTUS  
                
                        echo ("<p>Your registration is complete. The button below takes you to your profile.</p>");
                        echo ("<a href='profile.php'><button type='button'>Home feed</button></a>");
                    }catch(PDOException $e){
                        echo ("Error fetching information");
                    }
                }
            }catch(PDOException $e){
            echo ("Error inserting information");
            }
        }else {
            echo("Faulty username.");  
        }
       }else {
            echo("Faulty email address.");
        };  ?>
    </main>

    </body>
</html>