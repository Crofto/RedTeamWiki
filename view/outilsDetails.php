<?php

//On boucle sur la liste d'outil 
echo '<h1 Class="outilNomDetail">' .  $outil->nom . '</h1>';
echo '<p Class="outilDescriptionDetail">' ;
//on affiche sa description longue si il en a une
if ($outil->descriptionLongue == null || $outil->descriptionLongue == "" )
    echo  $outil->descriptionCourte; 
else
    echo  $outil->descriptionLongue; 

echo '</p>';

echo "<H2 Class='outilLien' >Les liens utiles : </H2>";

echo "<h3>Les Get Started : </h3>";
echo '<p Class="outilLienStarted"> <a href="' . $outil->lienGetStarted . '">' .  $outil->lienGetStarted . '</a></p>';
echo "<h3>Les liens Officiel : </h3>";
echo '<p Class="outilLienOfficiel"> <a href="' . $outil->lienOfficiel . '">' .  $outil->lienOfficiel . '</a></p>';
echo "<h3>Les liens de documentation : </h3>";
echo '<p Class="outilLienDoc"> <a href="' . $outil->lienDoc . '">' .  $outil->lienDoc . '</a></p>';

?>