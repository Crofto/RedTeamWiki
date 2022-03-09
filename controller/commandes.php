<?php
$commandeArray = array();

//On choppe tous les outils pour afficher les filtres 
$outilsArray = Outil::fetchAllOutils($conn);

$wantedOutilArray = array();

foreach($outilsArray as $outil){
    if ( isset($_POST[$outil->nom]) ){
        array_push($wantedOutilArray, $outil);
    }
}

if ( isset($_POST['isRechercheCommande']) ){
    $commandeArray = Commande::fetchCommandeFiltered($conn, $_POST['rechercheCommande'], $wantedOutilArray);
} else {
    $commandeArray = Commande::fetchAllCommande($conn);
}

require_once('./view/commandes.php');

?>