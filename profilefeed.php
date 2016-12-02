<?php
    $Id = htmlspecialchars($_GET["Id"]);

    //Get user info
    $sql = $DBH->prepare("SELECT * FROM a_Users WHERE Id = ?");
    $sql->execute([$Id]);
    $user = $sql->fetch(PDO::FETCH_OBJ);

    // Search for user's posts
    
    

    // Display profile banner
    if($user->Banner !== null){
        echo("<img src='images/uploads/".$user->Banner."' class='resize'>");
    }else {
        echo("<img src='images/banner/default.jpg' class='resize'>");
    }

        $smq=$DBH->prepare("SELECT * FROM a_Follow WHERE Followed=".$Id." and Follower=".$_SESSION['id']."");
        $smq->execute();

        if($smq->rowCount()===1){
            echo ('<a href="#" class="follow" id="'.$Id.'" title="Unfollow" onclick="return false"><img src="images/unfollow.png"></a>');
        }else{ 
            if($Id!==$_SESSION['id']){
            echo ('<a href="#" class="follow" id="'.$Id.'" title="Follow" onclick="return false"><img src="images/follow.png"></a>');
            }
        }; 
    
    //Display user's posts
    try{
        $sql = $DBH->prepare("SELECT * FROM a_Upload WHERE Uploader = ? ORDER BY UploadDate");
        $sql->execute([$Id]);
        
        
        while($row= $sql->fetch(PDO::FETCH_ASSOC)) {
            $smt = $DBH->prepare("SELECT COUNT(*) FROM a_Likes where UploadId = ?");
            $smt->execute([$row[Id]]);
            $likes = $smt->fetchColumn();

              
            echo("<article>
            <a href='#' class='feedPost' value='".$row['Id']."'
            onclick='return false'><img src='images/uploads/".$row['Url']."' class='resize' /></a>
            <h3>".$row['UploadName']."</h3>
            <h3>".$row['Description']."</h3>
            <h3>".$row['UploadDate']." ".$likes." <3</h3>"
            );
            
            echo("</article>");            
        }
           
        
    }catch(PDOException $e){
        echo("No posts");
    }


?>           
