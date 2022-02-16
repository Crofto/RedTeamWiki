<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="Outils">
    <input id="search" type="text" name="rechercheOutils" placeholder="Exemple: Kali">
    <input id="submit" type="submit" name="isRechercheOutils" value="Chercher">
</form>

<?php

//On boucle sur la list de vocab 
foreach($outilsArray as $outil){
    echo '<p Class="vocabNomList">' .  $vocab->nom . ' (' . $vocab->alias . ') : </p>' . 
        '<p Class="vocabDefinitionList">' .  $vocab->definition . '</p>' ; 
}


?>