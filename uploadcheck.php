<?php 
session_start();
include('header.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
<body>
    
<main>
<?php
    
function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
}

$imagetype= $_POST['it'];
switch($imagetype){
    case 'avatar':
        $imagesize = 50000;
        $width = 100;
        $height = 100;
        break;
    case 'banner':
        $imagesize = 1000000;
        break;
    default:
        $imagesize = 1000000;
}
    
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
/* Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > $imagesize) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newname = round(microtime(true)) . '.' . end($temp);
    $newfilename = $target_dir . $newname;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
        echo "<p>The file has been uploaded.</p>";
        
        //if downloading avatar
        if($imagetype == 'avatar'){
        try {
            $sql= $DBH->prepare("UPDATE a_Users SET Avatar = :avatar WHERE Id = ".$_SESSION['id']);
            $sql->bindParam(':avatar', $newname, PDO::PARAM_STR);
            $sql->execute();
            echo("<p>Avatar has been set sccessfully</p>");
            $_SESSION['avatar']=$newname;
        }catch(PDOException $e){
            echo("<p>Avatar wasn't set</p>");
        } }
        
        //if downloading banner
        elseif($imagetype == 'banner'){
        try {
            $sql= $DBH->prepare("UPDATE a_Users SET Banner = :banner WHERE Id = ".$_SESSION['id']);
            $sql->bindParam(':banner', $newname, PDO::PARAM_STR);
            $sql->execute();
            echo("<p>Banner has been set sccessfully</p>");
        }catch(PDOException $e){
            echo("<p>Banner wasn't set</p>");
        } }
        
        //if downloading art/etc
        else {
            $data = $_POST["data"];
            $date = date('Y-m-d');
            $data = array_push_assoc($data,'UploadDate', $date);
            $data = array_push_assoc($data,'Uploader', $_SESSION['id']);
            $data = array_push_assoc($data,'Url',$newname);
            try {
            $sql = $DBH->prepare("INSERT INTO 
                a_Upload (UploadName,Description,Url,UploadDate,Uploader)
                VALUES (:UploadName,:Description,:Url,:UploadDate, :Uploader);");    
            if($sql->execute($data)){
                $sql = "SELECT * FROM a_Upload WHERE Id = ".$DBH->lastInsertId().";";
					   $STH3 = $DBH->query($sql);
					   $STH3->setFetchMode(PDO::FETCH_OBJ);
					   $upload = $STH3->fetch();
                    echo("File uploaded, taking you to upload page.");
                       header( "refresh:4; url='profile.php?Id=".$_SESSION['id']."'" ); 
            }else {
                echo("Something went wrong with file upload");
            }
            }catch(PDOException $e){
                echo("Error inserting file to database");
            }
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
    

    </main>
    
    
<script src="js/menu.js"></script>
</body>
</html>