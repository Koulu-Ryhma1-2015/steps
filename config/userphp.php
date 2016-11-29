<?php 

//Login function and other user-related functions

function login($email, $pwd, $DBH){
include('password/lib/password.php');
    
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



?>