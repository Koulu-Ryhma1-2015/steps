<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/stylemain2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
        
    <script>
    function toggleSearch() {
    document.getElementById("searchBar").style.display="block";
    }
    </script>
        
    </head>   


<body>


 <nav id="rightMenu" class="hidden">
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
    
       <nav id="leftMenu" class="hidden"><!-- Left menu for profile pages, includes filtering, folders etc. -->
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
     
    </footer>


<script src="js/menu.js"></script>


</body>
 
</html>