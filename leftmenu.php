<?php
$Id = htmlspecialchars($_GET["Id"]);

    echo("<ul>
            <li id='filter'> 
            Filter by:
            <a href='javascript:void(0)' class='closebtn' onclick='closeFilter()'>Close menu</a>
            <li id='collections'> 
            Collections:</li>
            <li id='favourites'> 
            Faves:
            </li>
        </ul>");



?>