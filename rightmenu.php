<?php
if($_SESSION['loggedin']){
    if($_SESSION['avatar']!== null){
        echo("<img src='images/uploads/".$_SESSION['avatar']."'>");
    }else {
        echo("<img src='images/avatar/default.jpg'>");
    }
        
    echo("<h2>".$_SESSION['username']."</h2>");
    echo("<ul id='controls1'>
    <li><a href='main.php'>Home</a></li>
    <a href='upload.php'><li>New post</li></a>
    <li id='search'>
    Search</li>
    <li id='searchbar'>
    <form>
    <input type='text' name='search'>
    </form>
    </li>
    <li id='discover'>Jotain juttua</li>
    <a href='settings.php'><li>Settings</li></a>
    <a href='logout.php'><li>Log out</li></a>");
    
}else { //If user isn't logged in, show menu with login and register    
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



?>