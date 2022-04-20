<!-- Barre de recherche --> 
<?php 
    if ($resultatInsert != ""){
        echo $resultatInsert;
    }
?>

<form class="VocabInsert" method="post" id="Vocab">
    <label for="nomVocab">Nom</label>
    <br>
    <input id="nomVocab" type="text" name="nomVocab" placeholder="Exemple: PenTest" required>
    <br>
    <label for="aliasVocab">Alias</label>
    <br>
    <input id="aliasVocab" type="text" name="aliasVocab" placeholder="Test de penetration" required>
    <br>
    <label for="DefinitionVocab">Definition</label>
    <br>
    <input id="DefinitionVocab" type="text" name="DefinitionVocab" placeholder="test de penetration d'un system" required>
    <br>

    <input type="submit" name="isInsertVocab" value="Ajouter">

</form>
