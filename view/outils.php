<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="Outils">
    <input id="search" type="text" name="rechercheOutils" placeholder="Exemple: Kali">
    <input id="submit" type="submit" name="isRechercheOutils" value="Chercher">
</form>

<?php

//On boucle sur la liste d'outil 
foreach($outilsArray as $outil){
    echo '<p Class="outilNomList"><a href="' . base() . "outilsDetails/" . $outil->id . '" >'  .  $outil->nom . '</a></p>' . 
        '<p Class="outilDefinitionList">' .  $outil->descriptionCourte . '</p>' ; 
}

?>
