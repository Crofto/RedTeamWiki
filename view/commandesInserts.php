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
    <label for="Outils[]">Outils liés (ctrl+click pour en avoir plusieurs)</label>
    <select name = "Outils[]" multiple> 
        <?php
            foreach($outilsArray as $outil){
                echo '<option value = "' . $outil->id . '">' . $outil->nom . '</option>';
            }
        ?>
    </select>
    <br>
    <label for="Tags[]">Tags liés (ctrl+click pour en avoir plusieurs)</label>
    <select name = "Tags[]" multiple> 
        <?php
            foreach($tagArray as $tag){
                echo '<option value = "' . $tag->id . '">' . $tag->nom . '</option>';
            }
        ?>
    </select>
    <br>
    <label for="addTag">Ajouter des tags non éxistants</label>
    <input id="addTag" type="text" name="addTag" placeholder="si plusieurs tags, separer par des virgules">

    <br>
    <input id="submit" type="submit" name="isInsertCommande" value="Ajouter">

</form>
