<?php

    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306'; 
    $PARAM_nom_bd='redteamwiki'; // le nom de la base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $conn = new PDO(
        'mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd,
        $PARAM_utilisateur, 
        $PARAM_mot_passe, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function Connexion($conn)
    {
        try{
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion ok. </br>";
        }
        catch(Exception $e){
            die('Erreur :' . $e->getMessage());
        }
    }
?>