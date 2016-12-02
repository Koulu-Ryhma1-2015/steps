<?php
session_start();
include('header.php');

$id=htmlspecialchars($_GET["id"]);

function getPostInfo($DBH, $id){
    try{    
        $postinfo = array();
        $sql=$DBH->prepare("SELECT *,COUNT(*) FROM a_Upload JOIN a_Users ON a_Upload.Uploader=a_Users.Id JOIN a_Likes ON a_Upload.Id=a_Likes.UploadID WHERE a_Upload.Id= ?");
        $sql->execute([$id]);
        
        $postinfo = $sql->fetch(PDO::FETCH_OBJ);

        return $postinfo;
    }catch(PDOException $e){
        return false;
    }
}

    $postinfo=getPostInfo($DBH, $id);
    $jsonString = json_encode($postinfo);
    echo($jsonString);
    
   

       /* $sql = $DBH->prepare("SELECT * FROM a_Upload WHERE Id = ?");
        $sql->execute([$Id]);
        $post = $sql->fetch(PDO::FETCH_OBJ);
        
        $slq = $DBH->prepare("SELECT * FROM a_Users WHERE Id = ?");
        $slq->execute([$post->Uploader]);
        $uploader = $slq->fetch(PDO::FETCH_OBJ);

        $pid=$post->Id;
        $smq=$DBH->prepare("SELECT * FROM a_Likes WHERE UploadID=".$pid." and Sender=".$_SESSION['id']."");
        $smq->execute();
        
        $smt = $DBH->prepare("SELECT COUNT(*) FROM a_Likes where UploadId = ?");
        $smt->execute([$row[Id]]);
        $likes = $smt->fetchColumn();

        echo($post->Url);
        echo("<article class='post'>
        <img src='images/uploads/".$post->Url."' class='resize'>
        <h3>".$uploader->Username." <a href='profile.php?Id=".$uploader->Id."'><img src='images/uploads/".$uploader->Avatar."'></a></h3>
        <h3>".$post->UploadName."</h3>
        <h3>".$post->Description."</h3>
        <h3>".$post->UploadDate."</h3>");
        if($smq->rowCount()===1){
            echo ('<a href="#" class="like" id="'.$pid.'" title="Unlike" onclick="return false" value="'.$likes.'"><img src="images/liked2.png"></a>');
        }else{ 
            echo ('<a href="#" class="like" id="'.$pid.'" title="Like" onclick="return false" value="'.$likes.'"><img src="images/liked.png"></a> ');
        };        
        echo("<p class='likes'>".$likes."</p>");
        
        if($uploader->Id === $_SESSION['id']){
            echo("<button id='delete'>Delete</button>");
            echo("<button>Edit</button>");
            echo("<p id='deletebox'></p>"); 
        }
        echo("</article>");            
        }catch(PDOException $e){
        return false;
    
        
    }*/

?>
        
    