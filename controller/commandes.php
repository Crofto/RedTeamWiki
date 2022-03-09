<?php


$vocabulaireArray = array();

//On choppe tous les outils pour afficher les filtres 
$outilsArray = Outil::fetchAllOutils($conn);

if ( isset($_POST['isRechercheCommande'])){
    $vocabulaireArray = Vocabulaire::fetchVocabulaireFiltered($conn, $_POST['rechercheVocabulaire']);
} else {
    $vocabulaireArray = Vocabulaire::fetchAllVocabulaire($conn);
}

require_once('./view/commandes.php');

?>