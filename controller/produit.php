<?php

//on check les potentielles modifications de panier
if ( isset($_POST['ajoutePanier'])){
    $_SESSION['Panier']->addProduit( Produit::fetchProduit($conn, $_POST['ajoutePanier']) ) ;
    header('Location: '.$_SERVER['REQUEST_URI']); // pour refresh le header
}

//va servir pour l'affichage
$idProduit = explode("/", $_SERVER['QUERY_STRING'])[1];
$monProduit = Produit::fetchProduit($conn, $idProduit);


require_once('./view/produit.php');

?>
