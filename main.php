<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
        
    <script>
     function openNav() {
    document.getElementById("rightMenu").style.width="100%";
    document.getElementById("feed").style.marginRight ="100%";
}

function closeNav() {
    document.getElementById("rightMenu").style.width = "0";
    document.getElementById("feed").style.marginRight = "0";
}   
        
 /*   $(document).on("pagecreate","feed",function(){
        $("body").on("swipeleft",function(){
            openNav();
        });
    });*/
        </script>
    </head>
<body>

        <div id="rightMenu">
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
            <li>Home</li>
            <li>New post</li>
            </ul>
        </div>
        <div id="search">
        Search
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
    </div>

    <div id="feed">
        <div class="feedPostImg">
            <div class="feedImg" >
                <img src="images/fox.jpg" class="resize">
            </div>
            <div class="feedInfo">
                <div class="feedTitle">Työn nimi</div>
                <div class="feedAvatar"><img src="images/avatar.jpg" class="resize"></div>
            </div>
            <div class="feedFooter">
                <div class="feedFooterBox">PVM</div>
                <div class="feedFooterBox">T 4</div>
            </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        </div>
        
    </div>




    
</body>
</html>