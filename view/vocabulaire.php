<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="vocabulaire">
    <input id="search" type="text" name="rechercheVocabulaire" placeholder="Exemple: Pentest">
    <input id="submit" class = "btn" type="submit" name="isRechercheVocabulaire" value="Chercher">
</form>

<?php 
echo '<a class="Center" href="' . base() . 'vocabulaireInserts" > <button id="submit" class = "btn"name="isRechercheCommande"> Inserer du vocabulaire </button> </a>';

//On boucle sur la list de vocab 
foreach($vocabulaireArray as $vocab){
    echo '<p Class="vocabNomList">' .  htmlspecialchars($vocab->nom) . ' (' . htmlspecialchars($vocab->alias) . ') : </p>' . 
        '<p Class="vocabDefinitionList">' .  htmlspecialchars($vocab->definition) . '</p>' ; 
}


?>