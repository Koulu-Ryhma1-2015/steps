<?php

$user = 'niinarie';		//Käytäjänimi 
$pass = 'laulubase2016';		//Salasana
$host = 'mysql.metropolia.fi';  //Tietokantapalvelin
$dbname = 'niinarie';		//Tietokanta
// Muodostetaan yhteys tietokantaan
try {     //Avataan yhteys tietokantaan ($DBH on nyt luotu yhteysolio, nimi vapaasti valittavissa)
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
           // virheenkäsittely: virheet aiheuttavat poikkeuksen
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	// käytetään  merkistöä utf8
	$DBH->exec("SET NAMES utf8;");
} catch(PDOException $e) {
	echo "Yhteysvirhe.";  
            //Kirjoitetaan mahdollinen virheviesti tiedostoon
	file_put_contents('log/DBErrors.txt', 'Connection: '.$e->getMessage()."\n", FILE_APPEND);
} //HUOM hakemistopolku!

//This works in 5.2.3
//First function turns SSL on if it is off.
//Second function detects if SSL is on, if it is, turns it off.
