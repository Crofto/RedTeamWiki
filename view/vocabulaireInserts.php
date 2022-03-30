<!-- Barre de recherche --> 
<?php 
    if ($resultatInsert != ""){
        echo $resultatInsert;
    }
?>

<form class="VocabInsert" method="post" id="Vocab">
    <label for="nomVocab">Nom</label>
    <input id="nomVocab" type="text" name="nomVocab" placeholder="Exemple: PenTest" required>
    <br>
    <label for="aliasVocab">Alias</label>
    <input id="aliasVocab" type="text" name="aliasVocab" placeholder="Test de penetration" required>
    <br>
    <label for="DefinitionVocab">Definition</label>
    <input id="DefinitionVocab" type="text" name="DefinitionVocab" placeholder="test de penetration d'un system" required>
    <br>

    <input id="submit" type="submit" name="isInsertVocab" value="Ajouter">

</form>
