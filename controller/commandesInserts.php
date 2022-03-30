<?php
$commandeArray = array();
$resultatInsert = "";

//On check si on viens d'inserer une commande:
if(isset($_POST['isInsertCommande']) && isset($_POST['nomCommande']) && isset($_POST['aliasCommande'])  && isset($_POST['DescriptionCourteCommande']) ){
    if($_POST['nomCommande'] != "" && $_POST['aliasCommande'] != "" && $_POST['DescriptionCourteCommande'] != ""){
        $newCommande = new Commande(0, $_POST['nomCommande'], $_POST['aliasCommande'], $_POST['DescriptionCourteCommande'], $_POST['DescriptionCourteCommande']);
        $resultatInsert = $newCommande->insertCommande($conn);
    }
}

//On choppe tous les outils pour afficher les filtres 
$outilsArray = Outil::fetchAllOutils($conn);

$wantedOutilArray = array();

foreach($outilsArray as $outil){
    if ( isset($_POST[$outil->nom]) ){
        array_push($wantedOutilArray, $outil);
    }
}


require_once('./view/commandesInserts.php');

?>