
<?php

include("./model/Panier.php");

echo "controller/home.php";

$_SESSION['test'] = 42 ;
$_SESSION['Panier'] = new Panier;
$produit1 = new Produit(1, "produit1", 12, "ma description");
$produit2 = new Produit(2, "produit2", 10, "ma description2");
array_push($_SESSION['Panier']->produits, $produit1, $produit2);


require_once('./view/home.php');

?>