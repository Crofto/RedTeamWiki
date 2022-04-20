<?php

//On boucle sur la liste d'outil 
echo '<h1 Class="commandeNomDetail">' .  $commande->nom . '</h1>';
echo '<p Class="commandeDescriptionDetail">' ;
//on affiche sa description longue si il en a une
if ($commande->descriptionLongue == null || $commande->descriptionLongue == "" ){
    echo  $commande->descriptionCourte; 
}
else{
    echo   "<i>" . $commande->descriptionCourte ."</i>"; 
    echo  "<br/>"; 
    echo  $commande->descriptionLongue; 
}

echo '</p>';


?>