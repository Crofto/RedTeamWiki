<!-- Barre de recherche --> 
<?php 
    if ($resultatInsert != ""){
        echo $resultatInsert;
    }
?>

<form class="OutilsInsert" method="post" id="Outils">
    <label for="nomOutils">Nom</label>
    <br>
    <input id="nomOutils" type="text" name="nomOutils" placeholder="Exemple: nMap" required>
    <br>
    <label for="DescriptionCourteOutils">Description Courte</label>
    <br>
    <input id="DescriptionCourteOutils" type="text" name="DescriptionCourteOutils" placeholder="Exemple: fait un scan" required>
    <br>
    <label for="DescriptionLongueOutils">Description Longue</label>
    <br>
    <input id="DescriptionLongueOutils" type="text" name="DescriptionLongueOutils" placeholder="comment utiliser l'Outil">
    <br>
    <label for="lienGetStarted">Liens "Get Started"</label>
    <br>
    <input id="lienGetStarted" type="text" name="lienGetStarted" placeholder="(séparés par des virgules s'il y en a plusieurs)" required>
    <br>
    <label for="lienOfficiel">Liens Officiels</label>
    <br>
    <input id="lienOfficiel" type="text" name="lienOfficiel" placeholder="(séparés par des virgules s'il y en a plusieurs)" required>
    <br>
    <label for="lienDoc">Liens Doc</label>
    <br>
    <input id="lienDoc" type="text" name="lienDoc" placeholder="(séparés par des virgules s'il y en a plusieurs)" required>
    <br>

    <input type="submit" name="isInsertOutils" value="Ajouter">

</form>
