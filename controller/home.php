<?php

if ( isset($_POST['ajoutePanier'])){
    $_SESSION['Panier']->addProduit( Produit::fetchProduit($conn, $_POST['ajoutePanier']) ) ;
    header('Location: '.$_SERVER['REQUEST_URI']); // pour refresh le header
}


$listProduitRaw=Produit::fetchAllProduit($conn);
$listProduit = array();
foreach($listProduitRaw as $prod){
    array_push($listProduit, new Produit($prod['id'], $prod['libelle'], $prod['prix'], $prod['description']));
}


require_once('./view/home.php');

?>