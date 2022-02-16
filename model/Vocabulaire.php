<?php

class Vocabulaire{
    public $id;
    public $nom;
    public $alias;
    public $definition;  
    
    function __construct(int $id, string $nom, string $alias, string $definition ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->alias = $alias;
        $this->definition = $definition;
    }

    /**
     * On récupere tout le vocabulaire 
     */
    public static function fetchAllVocabulaire($conn)
    {
        $listVocabulaire = array();
        try{    
            $requete = $conn->prepare("SELECT * FROM Vocabulaire;");
            $requete->execute();
            $result = $requete->fetchAll();
            // On rempli notre tablea de resultat
            foreach($result as $vocabulaire){
                array_push($listVocabulaire, 
                    new Vocabulaire($vocabulaire['id'], $vocabulaire['nom'], $vocabulaire['alias'], $vocabulaire['definition']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listVocabulaire;
    }

    /**
     * On le vocabulaire lié à un id précis
     */
    public static function fetchVocabulaireId($conn, int $id)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM Vocabulaire where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }       
        return new Vocabulaire($result[0]['id'], $result[0]['libelle'], $result[0]['prix'], $result[0]['description']);
    }

    /**
     * Recherche du vocabulaire en fonction d'une chaine passé en paramètres
     * on va rechercher en fonctiondu nom de l'alias et, si on a une chaine de plus de 5 caracteres dans la definition
     */
    public static function fetchVocabulaireFiltered($conn, String $recherche)
    {
        //Si recherche est vide, on envoie tout
        if (strlen($recherche) == 0)
            return Vocabulaire::fetchAllVocabulaire($conn);

        $listVocabulaire = array();            
        try{    
            //On le met en lower pour éviter les pb et pas opti en sql  (méthode particulière car potentiels utf8)
            $rechercheLike = mb_strtolower("%$recherche%");
            //On check la taille pour pas rechercher dans definition à chaque fois
            if (strlen($recherche) > 5)
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Vocabulaire 
                    where lower(nom) like :recherche 
                        or lower(alias) like :recherche
                        or lower(definition) like :recherche ;"
                );
            else
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Vocabulaire 
                    where lower(nom) like :recherche 
                        or lower(alias) like :recherche"
                );                    
                     
            $requete->execute([':recherche' => $rechercheLike]);
            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $vocabulaire){
                array_push($listVocabulaire, 
                    new Vocabulaire($vocabulaire['id'], $vocabulaire['nom'], $vocabulaire['alias'], $vocabulaire['definition']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listVocabulaire;
    }
}
    
?>