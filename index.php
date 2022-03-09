<?php 
function base(){
    //echo "base : " . str_replace("index.php", "", $_SERVER['PHP_SELF']) . PHP_EOL;
    return str_replace("index.php", "", $_SERVER['PHP_SELF']);
}


echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/main.css\" type=\"text/css\">";

echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/header.css\" type=\"text/css\">";
// on inclu tous les modeles pour pas avoir a le faire apres... 
foreach (glob("./model/*.php") as $filename) {
    include $filename;
}

session_start();

// On insert le header
require_once("./view/header.php");


// On regarde ce que l'on a dans notre URL
$URL = explode("/", $_SERVER['QUERY_STRING']);

//On envoie la bonne page

echo '<div id="pageContent">';
if (file_exists("./controller/" . $URL[0] . ".php")){
    // On fait apparraitre notre page qui correspondra au premier truc apres le /
    require_once("./controller/" . $URL[0] . ".php");
}else {
    if ($URL[0] == '' || $URL[0] == null){
        require_once("./controller/home.php");
    }
    else
    {
        require_once("./view/404.php");
    }
}
echo "</div>";


// On insert le footer
require_once("./view/footer.php");
?>