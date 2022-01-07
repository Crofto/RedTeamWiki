<?php
if ( !isset($_SESSION['Panier']))
    $_SESSION['Panier'] = new Panier;

echo "<p> Nombre de produit dans le panier : " . $_SESSION['Panier']->getNombreProduits() . "</p>";
echo "<p> Sous total panier : " . $_SESSION['Panier']->getSousTotal() . "</p>";

echo "<a href = '". base() . "home'>Home</a>
        <a href = '". base() . "panier'>Panier</a>
        <a href = '". base() . "posts'>Posts</a>";
?>





