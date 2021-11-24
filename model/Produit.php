<?php

class Produit{
    public $id;
    public $libelle;
    public $prix;
    public $description;  
    
    function __construct(int $id, string $libelle, int $prix, string $description ) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->description = $description;
    }

    public static function fetchAllProduit($conn)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM produit;");
            $requete->execute();
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $result;
    }

    public static function fetchProduit($conn, int $id)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM produit where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }       
        return new Produit($result[0]['id'], $result[0]['libelle'], $result[0]['prix'], $result[0]['description']);
    }
}
    
?>