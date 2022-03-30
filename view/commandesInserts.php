<!-- Barre de recherche --> 
<?php 
    if ($resultatInsert != ""){
        echo $resultatInsert;
    }
?>

<form class="CommandeInsert" method="post" id="commande">
    <label for="nomCommande">Nom</label>
    <input id="nomCommande" type="text" name="nomCommande" placeholder="Exemple: nMap" required>
    <br>
    <label for="aliasCommande">Alias</label>
    <input id="aliasCommande" type="text" name="aliasCommande" required>
    <br>
    <label for="DescriptionCourteCommande">Description Courte</label>
    <input id="DescriptionCourteCommande" type="text" name="DescriptionCourteCommande" placeholder="Exemple: fait un scan" required>
    <br>
    <label for="DescriptionLongueCommande">Description Longue</label>
    <input id="DescriptionLongueCommande" type="text" name="DescriptionLongueCommande" placeholder="comment utiliser la commande">
    <br>
    
    <select name = "subject" multiple> 
        <option value = "english">ENGLISH</option>
        <option value = "maths">MATHS</option>
        <option value = "computer">COMPUTER</option>
        <option value = "physics">PHYSICS</option>
        <option value = "chemistry">CHEMISTRY</option>
        <option value = "hindi">HINDI</option>
    </select>

    <input id="submit" type="submit" name="isInsertCommande" value="Ajouter">

</form>
