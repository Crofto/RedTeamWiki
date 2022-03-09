<?php


$outilsArray = array();

if ( isset($_POST['isRechercheVocabulaire'])){
    $outilsArray = Outil::fetchOutilsFiltered($conn, $_POST['rechercheVocabulaire']);
} else {
    $outilsArray = Outil::fetchAllOutils($conn);
}

require_once('./view/outils.php');


?>