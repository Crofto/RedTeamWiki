<?php
$resultatInsert = "";

//On check si on viens d'inserer une Vocab:
if(isset($_POST['isInsertVocab']) && isset($_POST['nomVocab']) && isset($_POST['aliasVocab'])  && isset($_POST['DefinitionVocab']) ){
    if($_POST['nomVocab'] != "" && $_POST['aliasVocab'] != "" && $_POST['DefinitionVocab'] != ""){
        $newVocab = new Vocabulaire(0, $_POST['nomVocab'], $_POST['aliasVocab'], $_POST['DefinitionVocab']);
        $resultatInsert = $newVocab->insertVocabulaire($conn);
    }
}

require_once('./view/VocabulaireInserts.php');

?>