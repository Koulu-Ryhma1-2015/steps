<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        
    <script>
    $(document).ready(function() {
        $("#toggleSearch").click(function(){
        $("#searchBar").slideToggle(200);
      });
    });
    </script>
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

   <nav id="rightMenu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> <!-- tilapäinen sulkunappi -->
       <img src="images/avatar.jpg" class="center">
       <h3 id="menuUsername">Matti Meikäläinen</h3>
        <ul>
            <li><a href="main.php">Home</a></li>
            <li>New post</li>
            <li id="toggleSearch">Search</li>
            <li id="searchBar">
                <form>
                <input type="text" name="search" action="search.php" placeholder="Title, description, user...">
                </form>
            </li>
            <li id="menuDiscover">
                Tähän ehdotettua sisältöä
            </li>
            <li>Settings</li>
            <li>Log out</li>
        </ul>
    </nav>
    
    <nav id="leftMenu"><!-- Left menu for profile pages, includes filtering, folders etc. -->
       <a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a> <!-- tilapäinen sulkunappi -->
        <ul>
            <li>Filter by:</li> <!-- Filtering for content type -->
            <li>Collections:</li> <!-- User's collections -->
            <li>Favourites</li> <!-- User's favs -->
           </ul>
    </nav>

    <main id="feed">
        <div id="banner">
        <img src="images/banner.jpg" class="resize">
        <div id="bannerText"><h1>Profile</h1></div>
        </div>
        
        <div class="feedPostImg">
            <div class="feedImg" >
                <img src="images/fox.jpg" class="resize">
            </div>
            <div class="feedInfo">
                <div class="feedTitle"><h2>This title is title</h2></div>
                <div class="feedAvatar"><img src="images/avatar.jpg" class="resize"></div>
            </div>
            <div class="feedFooter">
                <div class="feedFooterBox">PVM</div>
                <div class="feedFooterBox2">T 4</div>
            </div>    
        </div>        
        
             
    </main>
    

    <footer>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
        <span style="font-size:30px;cursor:pointer" onclick="openFilter()">&#9776; Suodatus</span>
    </footer>



    
</body>
</html>