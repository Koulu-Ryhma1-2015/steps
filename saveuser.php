<?php
session_start();
include('header.php');
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
        if(filter_var($userdata["Email"], FILTER_VALIDATE_EMAIL)){
            if(preg_match("/^[a-öA-Ö ]*$/",$data['Username'])) {
            try {
                $sql = $DBH->prepare("INSERT INTO 
                a_Users (Username,Email,UPassword)
                VALUES
                (:Username,:Email,:UPassword);");    
            if($sql->execute($userdata)){
                try {                
                    $sql = "SELECT * FROM a_Users WHERE Id = ".$DBH->lastInsertId().";";
					   $STH3 = $DBH->query($sql);
					   $STH3->setFetchMode(PDO::FETCH_OBJ);
					   $user = $STH3->fetch();
					   $_SESSION["loggedin"] = true;
					   $_SESSION["Username"] = $user->Username;
                       $_SESSION["Email"] = $user->Email;
                       $_SESSION["Joindate"] = $user->Joindate; //!!!!!!!!!
                    
                       unset($_SESSION['userinfo']);
                
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
        }else {
            echo("Faulty username.");  
        }
        }else {
            echo("Faulty email address.");
        };?>
    </main>

    </body>
</html>