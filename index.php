<?php 

session_start();

// On insert le header
require_once("./view/header.php");


echo "<h1> index.php de base </h1>";


// On regarde ce que l'on a dans notre URL
$URL = explode("/", $_SERVER['QUERY_STRING']);

//On envoie la bonne page
if (file_exists("./controller/" . $URL[0] . ".php")){
    // On fait apparraitre notre page qui correspondra au premier truc apres le /
    require_once("./controller/" . $URL[0] . ".php");
}else {
    require_once("./view/404.php");
}



// On insert le footer
require_once("./view/footer.php");
?>