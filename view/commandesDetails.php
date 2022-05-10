<?php

//On boucle sur la liste d'outil 
echo '<h1 Class="commandeNomDetail">' .  htmlspecialchars($commande->nom) . '</h1>';
//on affiche ses tags s'il en a
foreach($commande->tags as $tag){
    echo '<button class="Tag" disabled> ' . htmlspecialchars($tag->nom) . ' </button>';
}
echo '<p Class="commandeDescriptionDetail">' ;
//on affiche sa description longue si il en a une
if ($commande->descriptionLongue == null || $commande->descriptionLongue == "" ){
    echo  htmlspecialchars($commande->descriptionCourte); 
}
else{
    echo   "<i>" . htmlspecialchars($commande->descriptionCourte) ."</i>"; 
    echo  "<br/>"; 
    echo  htmlspecialchars($commande->descriptionLongue); 
}

echo '</p>';


?>