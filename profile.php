<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/stylemain.css">
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
        function toggleSearch() {
    document.getElementById("searchBar").style.display="block";
        }
        
 /*   $(document).on("pagecreate","feed",function(){
        $("body").on("swipeleft",function(){
            openNav();
        });
    });*/
        </script>
<body>

   <nav id="rightMenu">
        <div id="profileBox">
        <div id="profilePicture">
            <img src="images/avatar.jpg">
            </div>
        <div id="profileName">
            Matti Meikäläinen
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
       </div>
        <div id="controls1">
            <ul>
            <li><a href="main.php">Home</a></li>
            <li>New post</li>
            </ul>
        </div>
        <div id="search" onclick="toggleSearch()">
        <ul><li>Search</li></ul>
        <form id="searchBar">
            <input type="text" name="search">
            </form>    
        </div>
        <div id="discover">
        Tähän ehdotettua sisältöä
        </div>
        <div id="controls2">
            <ul>            
            <li>Settings</li>
            <li>Log out</li>
            </ul>
        </div>
    </nav>
    
       <nav id="leftMenu"><!-- Left menu for profile pages, includes filtering, folders etc. -->
        <div id="filter"> <!-- Filtering for content type -->
            Filter by:
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a>
        <div id="collections"> <!-- User's collections -->
        Collections:
        
        </div>
        <div id="favourites"> <!-- User's favs -->
        Faves:
        </div>
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