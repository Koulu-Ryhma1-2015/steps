<?php
session_start();
include('header.php');
include('config/userphp.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    
    <script>
     function openNav() {
    document.getElementById("rightMenu").style.width="100%";
  //  document.getElementById("feed").style.marginRight ="100%";
}

        function closeNav() {
    document.getElementById("rightMenu").style.width = "0";
  //  document.getElementById("feed").style.marginRight = "0";
}   
        
    function openFilter() {
    document.getElementById("leftMenu").style.width="100%";
  //  document.getElementById("feed").style.marginLeft ="100%";
}

        function closeFilter() {
    document.getElementById("leftMenu").style.width = "0";
   // document.getElementById("feed").style.marginLeft = "0";
}   


        </script>
<body>
    
<?php

$id=htmlspecialchars($_GET["id"]);


    try{    
        $postinfo = array();
        $sql=$DBH->prepare("SELECT a_Upload.Id as uId,  Url,Username,a_Users.Id as usId,Avatar,UploadName,a_Upload.Description,UploadDate, COUNT(*) FROM a_Upload JOIN a_Users ON a_Upload.Uploader=a_Users.Id JOIN a_Likes ON a_Upload.Id=a_Likes.UploadID WHERE a_Upload.Id= ?");
        $sql->execute([$id]);
        
        $postinfo = $sql->fetch(PDO::FETCH_OBJ);

    }catch(PDOException $e){
        return false;
    }


        $pid=$postinfo->uId;
        $smq=$DBH->prepare("SELECT * FROM a_Likes WHERE UploadID=".$pid." and Sender=".$_SESSION['id']."");
        $smq->execute();
        

        echo("<article class='post'>
        <img src='images/uploads/".$postinfo->Url."' class='resize'>
        <h3>".$postinfo->Username." <a href='profile.php?Id=".$postinfo->usId."'><img src='images/uploads/".$postinfo->Avatar."'></a></h3>
        <h3>".$postinfo->UploadName."</h3>
        <h3>".$postinfo->Description."</h3>
        <h3>".$postinfo->UploadDate."</h3>");
        if($smq->rowCount()===1){
            echo ('<a href="#" class="like" id="'.$pid.'" title="Unlike" onclick="return false" value="'.$postinfo->COUNT.'"><img src="images/liked2.png"></a>');
        }else{ 
            echo ('<a href="#" class="like" id="'.$pid.'" title="Like" onclick="return false" value="'.$postinfo->COUNT.'"><img src="images/liked.png"></a> ');
        };        
        echo("<p class='likes'>".$postinfo->COUNT."</p>");
        
        if($uploader->Id === $_SESSION['id']){
            echo("<button id='delete'>Delete</button>");
            echo("<button>Edit</button>");
            echo("<p id='deletebox'></p>"); 
        }
        echo("</article>");            
        
    
        
    

?>
        

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/menu.js"></script>

    
</body>
</html>
    