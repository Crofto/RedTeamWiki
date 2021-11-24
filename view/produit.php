<?php

echo "<form method=\"post\">" ;
echo "<p> $monProduit->libelle </p>";
echo "<p> $monProduit->prix € </p>";
echo "<p> $monProduit->description </p>
<button type=\"submit\" name=\"ajoutePanier\" value=\"" . $monProduit->id . "\"> Ajouter au panier </button>";
echo " </form>";
?>