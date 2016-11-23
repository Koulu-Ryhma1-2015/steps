<?php 

//Login function and other user-related functions

function login($email, $pwd, $DBH){
    $options = ['cost' => 8,]; //password hashing options      
    
    try {
        $sql = $DBH->prepare("SELECT * FROM a_Users WHERE Email = ?");
        $sql->execute([$email]);
        $num = $sql->rowCount();        
        //$sql->setFetchMode(PDO::FETCH_OBJ);
        //$row = $sql->fetch();
        if($num > 0){
             while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                echo("success <br>");
                $hash = $row['UPassword'];
                echo(password_verify($pwd,$hash));
                if(password_verify($pwd,$hash)){
                    echo("<br> logged in");
                } else {
                    echo("Wrong password");
                }
             }
        }else {
            echo("fail");
            return false;
        }
        
    }catch(PDOEXception $e){
        echo("Login error");
    }
    
    }



?>