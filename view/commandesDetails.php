<?php

//On boucle sur la liste d'outil 
echo '<p Class="commandeNomDetail">' .  $commande->nom . '</p>';
echo '<p Class="commandeDescriptionDetail">' ;
//on affiche sa description longue si il en a une
if ($commande->descriptionLongue == null || $commande->descriptionLongue == "" ){
    echo  $commande->descriptionCourte; 
}
else{
    echo  $commande->descriptionCourte; 
    echo  "<br/>"; 
    echo  $commande->descriptionLongue; 
}

echo '</p>';


?>