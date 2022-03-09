<?php

class Commande{
    public $id;
    public $nom;
    public $alias;
    public $DescriptionCourte;  
    public $DescriptionLongue; 
    
    function __construct(int $id, string $nom, string $alias, string $DescriptionCourte, string $DescriptionLongue ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->alias = $alias;
        $this->DescriptionCourte = $DescriptionCourte;
        $this->DescriptionLongue = $DescriptionLongue;
    }

    /**
     * On récupere toutes les commandes 
     */
    public static function fetchAllCommande($conn)
    {
        $listCommande = array();
        try{    
            $requete = $conn->prepare("SELECT * FROM Commande;");
            $requete->execute();
            $result = $requete->fetchAll();
            // On rempli notre tablea de resultat
            foreach($result as $Commande){
                array_push($listCommande, 
                    new Commande($Commande['id'], $Commande['nom'], $Commande['alias'], $Commande['DescriptionCourte'], 
                        $Commande['DescriptionLongue']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listCommande;
    }

    /**
     * On choppe la commande liée à un id précis
     */
    public static function fetchCommandeId($conn, int $id)
    {
        try{    
            $requete = $conn->prepare("SELECT * FROM Vocabulaire where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        }       
        return new Commande($result[0]['id'], $result[0]['nom'], $result[0]['alias'], $result[0]['DescriptionCourte'], 
            $result[0]['DescriptionLongue']);
    }

    /**
     * Recherche de la commande en fonction d'une chaine passé en paramètre
     * on va rechercher en fonctiondu nom de l'alias et, si on a une chaine de plus de 5 caracteres dans la description longue
     */
    public static function fetchCommandeFiltered($conn, String $recherche, $listOutilId)
    {
        if(count($listOutilId) == 0 && strlen($recherche)){
            return Commande::fetchAllCommande($conn);
        }

        try{
            $listCommande = array();   
            $stringOutil = "(";
            foreach($listOutilId as $id)
                $stringOutil += $id;

            $stringOutil += ")";

            //Si recherche est vide, on cherche uniquement sur les outils
            if (strlen($recherche) == 0){
                 //On check la taille pour pas rechercher dans definition à chaque fois            
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Commande 
                    where id in ( select outilCommande.idCommande 
                        from outilcommande on commande.id = outilCommande.idCommande
                            inner join outil on outilcommande.idoutil = outil.id and outil.nom in :listOutil )"
                );                    
                        
                $requete->execute([':listOutil' => $stringOutil]);

            } else {
                //On le met en lower pour éviter les pb et pas opti en sql  (méthode particulière car potentiels utf8)
                $rechercheLike = mb_strtolower("%$recherche%");
                //On check la taille pour pas rechercher dans definition à chaque fois            
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Commande 
                    where (
                            lower(nom) like :recherche 
                            or lower(alias) like :recherche
                            or id in (select idcommande 
                                        from tagCommande 
                                            inner join tag on tagcommande.idtag = tag.id and tag.nom like :recherche) 
                        )
                        and id in ( select outilCommande.idCommande 
                            from outilcommande on commande.id = outilCommande.idCommande
                            inner join outil on outilcommande.idoutil = outil.id and outil.nom in :listOutil )"
                );                    
                        
                $requete->execute(array(':recherche' => $rechercheLike, ':listOutil' => $stringOutil));
            }
            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $Commande){
                array_push($listCommande, 
                    new Commande($Commande['id'], $Commande['nom'], $Commande['alias'], $Commande['DescriptionCourte'], 
                        $Commande['DescriptionLongue']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listCommande;
    }
}
    
?>