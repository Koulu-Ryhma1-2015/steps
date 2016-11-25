<?php 

//Login function and other user-related functions

function login($email, $pwd, $DBH){
 
    
    try {
        $sql = $DBH->prepare("SELECT * FROM a_Users WHERE Email = ?");
        $sql->execute([$email]);
        $num = $sql->rowCount();        
        if($num > 0){
             while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $hash = $row['UPassword'];
                if(password_verify($pwd,$hash)){
                    echo("<br> logged in");
                    $_SESSION['loggedin']=TRUE;
                    $_SESSION['id']=$row['Id'];
                    $_SESSION['username']=$row['Username'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['avatar']=$row['Avatar'];
                    return true;
                } else {
                    echo("Wrong password!");
                    echo("<form method='POST' action='login.php'>
                    <input type='text' name='email' id='email' placeholder='Email' value=".$email." required><br/>
                    <input type='password' name='pwd' id='pwd' placeholder='Password' required><br/>
                    <input type='submit' name='login' value='Log in'>
                    </form>");
                    
                }
             }
        }else {
            echo("User doesn't exist, try another email or register below.");
            echo("<form method='POST' action='login.php'>
            <input type='text' name='email' id='email' placeholder='Email' value=".$email." required><br/>
            <input type='password' name='pwd' id='pwd' placeholder='Password' required><br/>
            <input type='submit' name='login' value='Log in'>
            </form>");
            echo("<a href='register.php'><button>Register</button></a>");
        }
        
    }catch(PDOEXception $e){
        // echo("Login error");
    }
}

function logout(){
    session_unset();
    session_destroy();
   redirect('index.php');

}

function usermenu(){
    avatar();
    echo("<h2>".$_SESSION['username']."</h2>");
    echo("<ul id='controls1'>");
    echo("<li><a href='main.php'>Home</a></li>");
    echo("<li>New post</li>");
    echo("<li id='search' onclick='toggleSearch()'>");
    echo("Search</li>");
    echo("<form id='searchBar'>");
    echo("<input type='text' name='search'>");
    echo("</form>"); 
    echo("<li id='discover'>Jotain juttua</li>");
    echo("<li>Settings</li>");
    echo("<a href='logout.php'><li>Log out</li></a>");
}

function registermenu(){
    echo("<ul>");
    echo("<li id='login'>Log in</li>
    <li id='loginform'>
    <form method='POST' action='login.php'>
    <input type='text' name='email' id='email' placeholder='Email' required><br/>
    <input type='password' name='pwd' id='pwd' placeholder='Password' required><br/>
    <input type='submit' name='login' value='Log in'>
    </form>
    </li>
    </ul>");
    echo("<br><a href='register.php'>Register</a>");
}

function avatar(){
    if($_SESSION['avatar']!== null){
        echo("<img src='images/avatar/".$_SESSION['avatar']."'>");
    }else {
        echo("<img src='images/avatar/default.jpg'>");
    }
        
}


?>