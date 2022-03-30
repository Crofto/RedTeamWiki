<?php

class Commande{
    public $id;
    public $nom;
    public $alias;
    public $descriptionCourte;  
    public $descriptionLongue; 
    
    function __construct(int $id, string $nom, ?string $alias, ?string $DescriptionCourte, ?string $DescriptionLongue = null ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->alias = $alias;
        $this->descriptionCourte = $DescriptionCourte;
        $this->descriptionLongue = $DescriptionLongue;
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
                    new Commande($Commande['id'], $Commande['Nom'], $Commande['Alias'], $Commande['DescriptionCourte'], 
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
            $requete = $conn->prepare("SELECT * FROM Commande where id = :id;");
            $requete->execute([':id' => $id]);
            $result = $requete->fetchAll();
        }catch(PDOException $e){
            die($e->getMessage());
        } 

        foreach($result as $res)
            return new Commande($res['id'], $res['Nom'], $res['Alias'], $res['DescriptionCourte'], 
                $res['DescriptionLongue']);
        
        return new Commande(0, "", "", "", "");

    }

    /**
     * Recherche de la commande en fonction d'une chaine passé en paramètre
     * on va rechercher en fonctiondu nom de l'alias et, si on a une chaine de plus de 5 caracteres dans la description longue
     */
    public static function fetchCommandeFiltered($conn, String $recherche, $listOutil)
    {
        if(count($listOutil) == 0 && strlen($recherche)==0){
            return Commande::fetchAllCommande($conn);
        }

        try{
            // On parse les outil pour avoir un string utilisable
            $listCommande = array();   
            $stringOutil = "";
            foreach($listOutil as $outil){
                $stringOutil .= strval($outil->id) . ',';
            }

            $stringOutil = mb_substr($stringOutil, 0, -1);
            //Si recherche est vide, on cherche uniquement sur les outils
            if (strlen($recherche) == 0){
                 //On check la taille pour pas rechercher dans definition à chaque fois            
                $requete = $conn->prepare(
                    "SELECT * 
                    FROM Commande 
                    where id in ( select outilCommande.idCommande 
                        from outilcommande 
                            inner join outil on outilcommande.idoutil = outil.id and outil.id in ( :listOutil )  )"
                );                    
                $requete->bindParam(':listOutil', $stringOutil);
                $requete->execute(); 

            } else if (strlen($recherche) != 0  && count($listOutil) != 0 )  {
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
                            from outilcommande
                            inner join outil on outilcommande.idoutil = outil.id and outil.nom in ( :listOutil ) )"
                );                    
                $requete->bindParam(':listOutil', $stringOutil);
                $requete->bindParam(':recherche', $rechercheLike);
                        
                $requete->execute();
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
                       "
                );                    
                        
                $requete->execute(array(':recherche' => $rechercheLike));
            }

            $result = $requete->fetchAll();
            // On rempli notre tableau de resultat
            foreach($result as $Commande){
                array_push($listCommande, 
                    new Commande($Commande['id'], $Commande['Nom'], $Commande['Alias'], $Commande['DescriptionCourte'], 
                        $Commande['DescriptionLongue']));
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }        
        return $listCommande;
    }

    public function insertCommande($conn, $outil, $tagArray, $newTag):string
    {
        try{
            //On check si la commande existe déjà pour ne pas avoir de doublons
            $stmt = $conn->prepare("select id from commande where nom = :Nom ");
            $stmt->bindParam(':Nom', $this->nom); 
            $stmt->execute();
            $result = $stmt->fetchAll();
            if (is_array($result) && count($result)>0){
                return "Commande déjà existante";
            }

            //Insert de la commande
            $stmt = $conn->prepare("INSERT INTO commande
            (Nom, Alias, DescriptionCourte, DescriptionLongue) 
            VALUES (:Nom, :Aliass, :DescriptionCourte, :DescriptionLongue)");

            $stmt->bindParam(':Nom', $this->nom); 
            $stmt->bindParam(':Aliass', $this->alias); 
            $stmt->bindParam(':DescriptionCourte', $this->descriptionCourte); 
            $stmt->bindParam(':DescriptionLongue', $this->descriptionLongue); 

            $stmt->execute();

            $stmt = $conn->prepare("select id from commande where nom = :Nom ");
            $stmt->bindParam(':Nom', $this->nom); 
            $stmt->execute();
            $result = $stmt->fetchAll();
            $this->id = $result[0]['id'];

            //On insert les outils
            if($outil != null && count($outil) > 0){                
                foreach($outil as $idOutil){
                    $outilExiste = (Outil::fetchOutilId($conn, $idOutil)->id != 0);
                    if ($outilExiste){
                        $stmt = $conn->prepare("INSERT INTO outilcommande
                        (idOutil, idCommande) VALUES (:idOutil, :idCommande);");

                        $stmt->bindParam(':idOutil', $idOutil); 
                        $stmt->bindParam(':idCommande', $this->id); 
                        $stmt->execute();
                    }
                }
            }

            //On insert les Tag
            if($tagArray != null && count($tagArray) > 0){
                foreach($tagArray as $idTag){
                    $outilExiste = (Outil::fetchOutilId($conn, $idOutil)->id != 0);
                    if ($outilExiste){
                        $stmt = $conn->prepare("INSERT INTO TagCommande
                        (idTag, idCommande) VALUES ( :idTag , :idCommande );");

                        $stmt->bindParam(':idTag', $idTag); 
                        $stmt->bindParam(':idCommande', $this->id); 
                        $stmt->execute();
                    }
                }
            }

            if($newTag != null && strlen($newTag) > 0){
                foreach(explode(", ", $newTag) as $nomTag){
                    echo "nomTag" . $nomTag;
                    (new Tag(0, $nomTag))->insertTag($conn);
                    $idTag = Tag::fetchTagNom($conn, $nomTag)->id;
                    echo "idTag" . $idTag;
                    $stmt = $conn->prepare("INSERT INTO TagCommande
                        (idTag, idCommande) VALUES ( :idTag , :idCommande );");

                    $stmt->bindParam(':idTag', $idTag); 
                    $stmt->bindParam(':idCommande', $this->id); 
                    $stmt->execute();
                }
            }

            return "Commande insérée";
        }catch(PDOException $e){
            return "Commande non insérée";

        }
    }
}
?>