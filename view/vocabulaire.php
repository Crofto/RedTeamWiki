<!-- Barre de recherche --> 
<form class="barreRecherche" method="post" id="vocabulaire">
    <input id="search" type="text" name="rechercheVocabulaire" placeholder="Exemple: Pentest">
    <input id="submit" class = "btn" type="submit" name="isRechercheVocabulaire" value="Chercher">
</form>

<?php 
echo '<a href="' . base() . 'vocabulaireInserts" > Ajouter du vocabulaire </a>'; 

//On boucle sur la list de vocab 
foreach($vocabulaireArray as $vocab){
    echo '<p Class="vocabNomList">' .  $vocab->nom . ' (' . $vocab->alias . ') : </p>' . 
        '<p Class="vocabDefinitionList">' .  $vocab->definition . '</p>' ; 
}


?>