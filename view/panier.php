<?php

echo "<form method=\"post\">" ;
foreach($_SESSION['PanierFormatte'] as $ProduitForm){
    echo "<p>Nom du produit: " . $ProduitForm[0]->libelle . "</p>" .
        "<p>Prix du produit: " . $ProduitForm[0]->prix  . "€</p>" .
        "<p> Qte: " . $ProduitForm[1] . "</p>" .       
        "<button type=\"submit\" name=\"enleveQTE\" value=\"" . $ProduitForm[0]->id . "\"> -1 </button>" .        
        "<button type=\"submit\" name=\"ajouteQTE\" value=\"" . $ProduitForm[0]->id . "\"> +1 </button>" .
        "<button type=\"submit\" name=\"clear\" value=\"" . $ProduitForm[0]->id . "\"> supprimer </button> <br>" ;
}

echo " </form>";

echo "<br><br> <p> sous total produit : " . $_SESSION['Panier']->getSousTotal() . " </p>";
echo "<p> nombre de produit : " . $_SESSION['Panier']->getNombreProduits() . " </p>";
?>