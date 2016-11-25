<?php
    $Id = htmlspecialchars($_GET["Id"]);

    //Get user info
    $sql = $DBH->prepare("SELECT * FROM a_Users WHERE Id = ?");
    $sql->execute([$Id]);
    $user = $sql->fetch(PDO::FETCH_OBJ);

    // Search for user's posts
    
    

    // Display profile banner
    if($user->Banner !== null){
        echo("<img src='images/banner/".$user->Banner."' class='resize'>");
    }else {
        echo("<img src='images/banner/default.jpg' class='resize'>");
    }
    
    echo("
    <h2>".$user->Username."</h2>");
    
    
    //Display user's posts
    try{
        $sql = $DBH->prepare("SELECT * FROM a_Upload WHERE Uploader = ?");
        $sql->execute([$Id]);
        
        
        while($row= $sql->fetch(PDO::FETCH_ASSOC)) {
            $smt = $DBH->prepare("SELECT COUNT(*) FROM a_Likes where UploadId = ?");
            $smt->execute([$row[Id]]);
            $likes = $smt->fetchColumn();

              
            echo("<article class='feedPost'>
            <h3>".$row['UploadName']."</h3>
            <h3>".$row['Description']."</h3>
            <h3>".$row['UploadDate']."</h3>
            <h3>".$likes." <3</h3>"
            );
            
            echo("</article>");

            
        }
           
        
    }catch(PDOException $e){
        echo("No posts");
    }


?>