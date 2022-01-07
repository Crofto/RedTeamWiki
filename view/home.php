
<?php

echo "<form method=\"post\" id=\"home\">" ;

foreach($listProduit as $prod){
    //echo "Redirige vers " . base() . "produit/" . $prod->id ;
    echo "<a href=\"". base() . "produit/" . $prod->id . "\" > <div>";
    echo "<p> ma photo de " .  $prod->libelle . " </p>" . 
        "<p> pour seulement " .  $prod->prix . "€ </p> 
        <button type=\"submit\" class=\"btn\" name=\"ajoutePanier\" value=\"" . $prod->id . "\"> Ajouter au panier </button> <br> <br>" ;
    echo "</div> </a> <br>";    
}

echo " </form>";

?>