<?php

$vocabulaireArray = array();

if ( isset($_POST['isRechercheVocabulaire'])){
    $vocabulaireArray = Vocabulaire::fetchVocabulaireFiltered($conn, $_POST['rechercheVocabulaire']);
} else {
    $vocabulaireArray = Vocabulaire::fetchAllVocabulaire($conn);
}

require_once('./view/vocabulaire.php');


?>