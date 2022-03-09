<?php


// On tente de trouver l'id de l'outil a afficher
try{
    $tab = explode("/", $_SERVER['QUERY_STRING']);
    $idCommande = intval($tab[count($tab)-1]);
    // le intval cast les string à 0 si il n'y arrive pas tout seul
    if ($idCommande == 0){
        throw new Exception("Casse pas mon site");
    }
    $commande = Commande::fetchCommandeId($conn, $idCommande);

    if($commande->id != 0) 
        require_once('./view/commandesDetails.php');
    else 
        throw new Exception("Casse pas mon site");

}catch(Exception $e){
    // si on a une erreur ->  404
    require_once('./view/404.php');
}



?>