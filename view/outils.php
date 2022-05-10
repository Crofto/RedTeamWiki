<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="Outils">
    <input id="search" type="text" name="rechercheOutils" placeholder="Exemple: Kali">
    <input id="submit" class = "btn" type="submit" name="isRechercheOutils" value="Chercher">
</form>

<?php

echo '<a href="' . base() . 'outilsInserts" > Inserer des outils </a>';

//On boucle sur la liste d'outil 
foreach($outilsArray as $outil){
    echo '<p Class="outilNomList"><a href="' . base() . "outilsDetails/" . $outil->id . '" >'  .  htmlspecialchars($outil->nom) . '</a></p>' . 
        '<p Class="outilDefinitionList">' .  htmlspecialchars($outil->descriptionCourte) . '</p>' ; 
}

?>
