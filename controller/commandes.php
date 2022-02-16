<?php


$vocabulaireArray = array();

if ( isset($_POST['isRechercheCommande'])){
    $vocabulaireArray = Vocabulaire::fetchVocabulaireFiltered($conn, $_POST['rechercheVocabulaire']);
} else {
    $vocabulaireArray = Vocabulaire::fetchAllVocabulaire($conn);
}

require_once('./view/commandes.php');

?>