<?php
$resultatInsert = "";

//On check si on viens d'inserer une commande:
if(isset($_POST['isInsertOutil']) && isset($_POST['nomOutils']) && isset($_POST['DescriptionCourteOutils'])  && isset($_POST['DescriptionLongueOutils']) && isset($_POST['lienGetStarted']) && isset($_POST['lienOfficiel']) && isset($_POST['lienDoc']) ){
    if($_POST['nomOutils'] != "" && $_POST['DescriptionCourteOutils'] != "" && $_POST['lienGetStarted'] != ""  && $_POST['lienOfficiel'] != ""  && $_POST['lienDoc'] != ""  ){
        $newCommande = new Outil
        (0, $_POST['nomOutils'], $_POST['DescriptionCourteOutils'], $_POST['DescriptionLongueOutils'], $_POST['lienGetStarted'],  $_POST['lienOfficiel'], $_POST['lienDoc'] );
        $resultatInsert = $newCommande->insertOutil($conn);
    }
}

require_once('./view/outilsInserts.php');

?>