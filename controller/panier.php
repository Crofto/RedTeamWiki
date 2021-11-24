<?php

//on check les potentielles modifications de panier
if ( isset($_POST['enleveQTE']))
    $_SESSION['Panier']->removeProduitId($_POST['enleveQTE']);
if ( isset($_POST['ajouteQTE']))
    $_SESSION['Panier']->addProduitId($_POST['ajouteQTE']);
if ( isset($_POST['clear']))
    $_SESSION['Panier']->clearProduitId($_POST['clear']);

if ( isset($_POST['enleveQTE']) || isset($_POST['ajouteQTE']) ||  isset($_POST['clear']) )
    header('Location: '.$_SERVER['REQUEST_URI']); // pour refresh le header

//va servir pour l'affichage
$produitsPanier = array();
// on formatte le panier pour chopper un affichage acceptable
foreach($_SESSION['Panier']->produits as $produit){
    if ( !isset($produitsPanier[$produit->id])){     
        $produitsPanier[$produit->id] = array($produit, 1);
    }        
    else{
        $produitsPanier[$produit->id][1] = $produitsPanier[$produit->id][1]+1;
    }
}

$_SESSION['PanierFormatte'] = $produitsPanier;
require_once('./view/panier.php');

?>