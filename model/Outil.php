<?php

class Outil{
    public $id;
    public $nom;
    public $descriptionCourte;
    public $descriptionLongue;  
    public $lienGetStarted ;   
    public $lienOfficiel;  
    public $lienDoc;  
    
    function __construct(int $id, string $nom, string $descriptionCourte, ?string $descriptionLongue, 
            string $lienGetStarted, string $lienOfficiel, string $lienDoc ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->descriptionCourte = $descriptionCourte;
        $this->descriptionLongue = $descriptionLongue;
        $this->lienGetStarted = $lienGetStarted;
        $this->lienOfficiel = $lienOfficiel;
        $this->lienDoc = $lienDoc;
    }

    /**
     * On récupere tout les outils 
     */
    public static function fetchAllOutils($conn)
    {
        $listOutils = array();
        try{    
            $requete = $conn->prepare("SELECT * FROM Outil;");
            $requete->execute();
            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $outil){
                array_push($listOutils, 
                    new Outil($outil['id'], $outil['nom'], $outil['descriptionCourte'], $outil['descriptionLongue'],
                        $outil['lienGetStarted'], $outil['lienOfficiel'], $outil['lienDoc']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listOutils;
    }

    /**
     * On recupère l'outil lié à un id précis
     */
    public static function fetchOutilId($conn, int $id)
    {
        // Affiche le titre_ressource de l'article ainsi que sa date de création
        try{    
            $requete = $conn->prepare("SELECT * FROM Outil where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }       
        return new Outil($result[0]['id'], $result[0]['nom'], $result[0]['descriptionCourte'], $result[0]['descriptionLongue'],
                        $result[0]['lienGetStarted'], $result[0]['lienOfficiel'], $result[0]['lienDoc']);
    }

    /**
     * Recherche du vocabulaire en fonction d'une chaine passé en paramètres
     * on va rechercher en fonctiondu nom de l'alias et, si on a une chaine de plus de 5 caracteres dans la definition
     */
    public static function fetchOutilsFiltered($conn, String $recherche)
    {
        //Si recherche est vide, on envoie tout
        if (strlen($recherche) == 0)
            return Outil::fetchAllOutils($conn);

        $listOutils = array();            
        try{    
            //On le met en lower pour éviter les pb et pas opti en sql (méthode particulière car potentiels utf8)
            $rechercheLike = mb_strtolower("%$recherche%");
            //On check la taille pour pas rechercher dans la description à chaque fois
            if (strlen($recherche) > 5)
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Outil 
                    where lower(nom) like :recherche 
                        or lower(descriptionCourte) like :recherche ;"
                );
            else
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Outil 
                    where lower(nom) like :recherche"
                );                    
                     
            $requete->execute([':recherche' => $rechercheLike]);
            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $outil){
                array_push($listOutils, 
                    new Outil($outil['id'], $outil['nom'], $outil['descriptionCourte'], $outil['descriptionLongue'],
                        $outil['lienGetStarted'], $outil['lienOfficiel'], $outil['lienDoc']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listOutils;
    }
}
    
?>