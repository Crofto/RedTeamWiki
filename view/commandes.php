<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="vocabulaire">
    <input id="search" type="text" name="rechercheCommande" placeholder="Exemple: Pentest">
    <input id="submit" type="submit" name="isRechercheCommande" value="Chercher">

    <?php
    //On boucle sur la list de vocab 
    foreach($outilsArray as $outil){
        echo '<input type="checkbox" name="' . $outil->nom . '" class="checkBouttonOutil" id="' . $outil->id . '">';
        echo '<label for="' . $outil->id . '" class="labelBouttonOutil"> ' . $outil->nom . ' </label>';
    }
    ?>

</form>


<?php

//On boucle sur la list de vocab 
foreach($vocabulaireArray as $cmd){
    echo '<p Class="CommandeNomList">' .  $cmd->nom . ' (' . $cmd->alias . ') : </p>' . 
        '<p Class="CommandeDescriptionList">' .  $cmd->DescriptionCourte . '</p>' ; 
}

?>