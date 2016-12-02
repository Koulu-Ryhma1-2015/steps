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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
    
    <div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
    </div>

   <nav id="rightMenu">
       <!-- INCLUDE RIGHT MENU  -->
       <?php include('rightmenu.php'); ?>
       
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close menu</a>
    </nav>
    
    
    <!-- INCLUDE FEED -->
    <main id="feed">    
 
    <?php 

        
    try {
    $sql=$DBH->prepare("SELECT * FROM a_Upload WHERE Uploader IN(SELECT Followed FROM a_Follow WHERE Follower = ".$_SESSION['id'].") ORDER BY UploadDate DESC");
    $sql->execute();
        
        
    while($row= $sql->fetch(PDO::FETCH_ASSOC)) {
        $smt = $DBH->prepare("SELECT COUNT(*) FROM a_Likes where UploadId = ?");
        $smt->execute([$row[Id]]);
        $likes = $smt->fetchColumn();
        
        $slq = $DBH->prepare("SELECT * FROM a_Users WHERE Id = ?");
        $slq->execute([$row[Uploader]]);
        $uploader = $slq->fetch(PDO::FETCH_OBJ);
    
        $pid=$row[Id];
        $smq=$DBH->prepare("SELECT * FROM a_Likes WHERE UploadID=".$pid." and Sender=".$_SESSION['id']."");
        $smq->execute();
              
        echo("<article>
        <a href='#' class='feedPost' value='".$row['Id']."'
            onclick='return false'>
        <img src='images/uploads/".$row['Url']."' class='resize'></a>
        <h3>".$uploader->Username." <a href='profile.php?Id=".$uploader->Id."'><img src='images/uploads/".$uploader->Avatar."'></a></h3>
        <h3>".$row['UploadName']."</h3>
        <h3>".$row['Description']."</h3>
        <h3>".$row['UploadDate']);
        if($smq->rowCount()===1){
            echo ('<a href="#" class="like" id="'.$pid.'" title="Unlike" onclick="return false" value="'.$likes.'"><img src="images/liked2.png"></a>');
        }else{ 
            echo ('<a href="#" class="like" id="'.$pid.'" title="Like" onclick="return false" value="'.$likes.'"><img src="images/liked.png"></a> ');
        };
        echo("<p class='likes'>".$likes."</p>");
        
            
        echo("</article>");

            
        }
        
    }catch(PDOException $e){
        echo("Error fetching feed.");
    }
        
    ?>
        
    </main>
    

    

<script src="js/menu.js"></script>

    
</body>
</html>