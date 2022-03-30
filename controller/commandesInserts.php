<?php
$resultatInsert = "";

//On check si on viens d'inserer une commande:
if(isset($_POST['isInsertCommande']) && isset($_POST['nomCommande']) && isset($_POST['aliasCommande'])  && isset($_POST['DescriptionCourteCommande']) ){
    if($_POST['nomCommande'] != "" && $_POST['aliasCommande'] != "" && $_POST['DescriptionCourteCommande'] != ""){
        $newCommande = new Commande(0, $_POST['nomCommande'], $_POST['aliasCommande'], $_POST['DescriptionCourteCommande'], $_POST['DescriptionCourteCommande']);
        $resultatInsert = $newCommande->insertCommande($conn, 
            (isset($_POST['Outils']) ? $_POST['Outils'] : null ),
            (isset($_POST['Tags']) ? $_POST['Tags'] : null ),
            (isset($_POST['addTag']) ? $_POST['addTag'] : null ));
    }
}

//On choppe tous les outils pour afficher les filtres 
$outilsArray = Outil::fetchAllOutils($conn);

//On choppe tous les outils pour afficher les filtres 
$tagArray = Tag::fetchAllTag($conn);

require_once('./view/commandesInserts.php');

?>