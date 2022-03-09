<?php

//On boucle sur la liste d'outil 
echo '<p Class="outilNomDetail">' .  $outil->nom . '</p>';
echo '<p Class="outilDescriptionDetail">' ;
//on affiche sa description longue si il en a une
if ($outil->descriptionLongue == null || $outil->descriptionLongue == "" )
    echo  $outil->descriptionCourte; 
else
    echo  $outil->descriptionLongue; 

echo '</p>';

echo '<p Class="outilLienStarted"> <a href="' . $outil->lienGetStarted . '">' .  $outil->lienGetStarted . '</a></p>';
echo '<p Class="outilLienOfficiel"> <a href="' . $outil->lienOfficiel . '">' .  $outil->lienOfficiel . '</a></p>';
echo '<p Class="outilLienDoc"> <a href="' . $outil->lienDoc . '">' .  $outil->lienDoc . '</a></p>';

?>