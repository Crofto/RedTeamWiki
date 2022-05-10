<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="commande">
    <input id="search" type="text" name="rechercheCommande" placeholder="Exemple: nmap">
    <input id="submit" class = "btn" type="submit" name="isRechercheCommande" value="Chercher"> 
       

    <br>
    <?php
    //On boucle sur la liste d'outil 
    foreach($outilsArray as $outil){
        echo '<input type="checkbox" name="' . htmlspecialchars($outil->nom) . '" class="checkBouttonOutil" id="' . $outil->id . '">';
        echo '<label for="' . $outil->id . '" class="labelBouttonOutil"> ' . htmlspecialchars($outil->nom) . ' </label>';
    }
    ?>

</form>

<?php
echo '<a class="Center" href="' . base() . 'commandesInserts" > <button id="submit" class = "btn"name="isRechercheCommande"> Inserer des commandes </button> </a>';

//On boucle sur la list de vocab 
foreach($commandeArray as $cmd){
    echo '<p Class="CommandeNomList"> <a href="' . base() . "commandesDetails/" . $cmd->id . '" >'  .  htmlspecialchars($cmd->nom) . '</a> &nbsp';
    foreach($cmd->tags as $tag){
        echo '<button class="Tag" disabled> ' . htmlspecialchars($tag->nom) . ' </button>';
    }
    echo '</p><p Class="CommandeDescriptionList">' .  htmlspecialchars($cmd->descriptionCourte) . '</p>' ; 
}

?>