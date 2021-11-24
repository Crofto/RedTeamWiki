
<?php

echo "<form method=\"post\">" ;

foreach($listProduit as $prod){
    echo "<a href=\"". base() . "produit/" . $prod->id . "\" > <div>";
    echo "<p> ma photo de " .  $prod->libelle . " </p>" . 
        "<p> pour seulement " .  $prod->prix . "€ </p> 
        <button type=\"submit\" name=\"ajoutePanier\" value=\"" . $prod->id . "\"> Ajouter au panier </button> <br> <br>" ;
    echo "</div> </a> ";    
}

echo " </form>";


?>