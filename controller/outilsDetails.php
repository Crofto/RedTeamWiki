<?php


// On tente de trouver l'id de l'outil a afficher
try{
    $tab = explode("/", $_SERVER['QUERY_STRING']);
    $idOutil = intval($tab[count($tab)-1]);
    // le intval cast les string à 0 si il n'y arrive pas tout seul
    if ($idOutil == 0){
        throw new Exception("Casse pas mon site");
    }
    $outil = Outil::fetchOutilId($conn, $idOutil);
    if($outil->id != 0) 
        require_once('./view/outilsDetails.php'); 
    else
        throw new Exception();
}catch(Exception $e){
    // si on a une erreur ->  404
    require_once('./view/404.php');
}


?>