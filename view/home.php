
<?php

echo "view/home.php";

$sousTotal = $_SESSION['Panier'];

echo "<p> sous total produit : " . $sousTotal->getSousTotal() . " </p>";

echo "<p> Valeur a afficher : " . $_SESSION['test'] . " </p>";



?>