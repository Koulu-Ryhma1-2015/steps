<?php
if($_SESSION['loggedin']){
    if($_SESSION['avatar']!== null){
        echo("<img src='images/avatar/".$_SESSION['avatar']."'>");
    }else {
        echo("<img src='images/avatar/default.jpg'>");
    }
        
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
}else {    
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