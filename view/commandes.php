<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="commande">
    <input id="search" type="text" name="rechercheCommande" placeholder="Exemple: nmap">
    <input id="submit" class = "btn" type="submit" name="isRechercheCommande" value="Chercher">

    <?php
    //On boucle sur la liste d'outil 
    foreach($outilsArray as $outil){
        echo '<input type="checkbox" name="' . $outil->nom . '" class="checkBouttonOutil" id="' . $outil->id . '">';
        echo '<label for="' . $outil->id . '" class="labelBouttonOutil"> ' . $outil->nom . ' </label>';
    }
    ?>

</form>

<?php
echo '<a href="' . base() . 'commandesInserts" > Inserer des commandes </a>';

//On boucle sur la list de vocab 
foreach($commandeArray as $cmd){
    echo '<p Class="CommandeNomList"> <a href="' . base() . "commandesDetails/" . $cmd->id . '" >'  .  $cmd->nom . '</a></p>'. 
        '<p Class="CommandeDescriptionList">' .  $cmd->descriptionCourte . '</p>' ; 
}

?>