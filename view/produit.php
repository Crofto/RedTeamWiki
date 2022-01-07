<?php

echo "<form method=\"post\">" ;
echo "<p> $monProduit->libelle </p>";
echo "<p> $monProduit->prix € </p>";
echo "<p> $monProduit->description </p>
<button type=\"submit\" class=\"btn\" name=\"ajoutePanier\" value=\"" . $monProduit->id . "\"> Ajouter au panier </button>";
echo " </form>";

?>