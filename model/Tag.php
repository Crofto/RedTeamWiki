<?php

class Tag{
    public $id;
    public $nom;
    
    function __construct(int $id, string $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    /**
     * On récupere tout les outils 
     */
    public static function fetchAllTag($conn)
    {
        $listOutils = array();
        try{    
            $requete = $conn->prepare("SELECT * FROM Tag;");
            $requete->execute();
            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $outil){
                array_push($listOutils, new Tag($outil['id'], $outil['nom']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listOutils;
    }

    /**
     * On recupère le tag lié à un id précis
     */
    public static function fetchTagId($conn, int $id)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM Tag where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        } 
        foreach($result as $res)      
            return new Tag($res['id'], $res['nom']);
                
        return new Tag(0, "");
    }

    /**
     * On recupère le tag lié à un nom précis
     */
    public static function fetchTagNom($conn, string $nom)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM Tag where nom = :nom;");
            $requete->execute([':nom' => $nom]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        } 
        foreach($result as $res)      
            return new Tag($res['id'], $res['nom']);
                
        return new Tag(0, "");
    }

    /**
     * On recupère les tags liés à une commande
     */
    public static function fetchTagCommande($conn, int $id)
    {
        $listTags = array();  
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare(
                "SELECT * 
                FROM Tag 
                inner join TagCommande on tagcommande.idTag = tag.id
                where tagCommande.idCommande = :id ;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        foreach($result as $res)    
            array_push($listTags, new Tag($res['id'], $res['nom']));
                
        return $listTags;
    }

    public function insertTag($conn)
    {
        try{
            //On check si l'outil existe déjà pour ne pas avoir de doublons
            $stmt = $conn->prepare("select id from outil where nom = :Nom ");
            $stmt->bindParam(':Nom', $this->nom); 
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (is_array($result) && count($result)>0){
                return "Tag déjà existant";
            }

            //Insert de la outil
            $stmt = $conn->prepare("INSERT INTO tag (Nom) VALUES (:Nom)");
            $stmt->bindParam(':Nom', $this->nom); 
            $stmt->execute();

            return "Tag inséré";
        }catch(PDOException $e){
            return "Tag non inséré";
        }
    }
}
    
?>