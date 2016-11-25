<?php
session_start();
include('header.php');
include('config/userphp.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/stylemain.css">
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
        function toggleSearch() {
    document.getElementById("searchBar").style.display="block";
        }

        </script>
<body>

   <nav id="rightMenu">
       <?php include('rightmenu.php'); ?>
       
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </nav>
    
    <nav id="leftMenu"><!-- Left menu for profile pages, includes filtering, folders etc. -->
        <ul>
            <li id="filter"> <!-- Filtering for content type -->
            Filter by:
            <a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a>
            <li id="collections"> <!-- User's collections -->
            Collections:</li>
            <li id="favourites"> <!-- User's favs -->
            Faves:
            </li>
        </ul>
    </nav>

    <main id="feed">
    
    <?php include('profilefeed.php'); ?>
             
    </main>
    

    <footer>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
        <span style="font-size:30px;cursor:pointer" onclick="openFilter()">&#9776; Suodatus</span>
    </footer>

<script src="js/menu.js"></script>

    
</body>
</html>