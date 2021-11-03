<?php

    include("config.php");
    class manipulationBDD
    {
        // Méthode pour ajouter une ressource avec image dans la BDD
        public function ajouterDonneesImg($var_titre_ressource, $var_date_ajout, $var_chemin, $var_description, $var_categories, $var_ressources, $var_relations, $conn)
        {
            $return = "";
            //gitvar_dump($_SESSION['idUser']);
            $requete_insert =  "INSERT INTO ressources (titre_ressource, description_ressource, date_creation_ressource, chemin_document, id_utilisateur, id_categories, id_type, id_relation_ressource, id_statut)
            VALUES ('" . $var_titre_ressource . "', '" . $var_description . "', '" . $var_date_ajout . "', '" . $var_chemin . "', '".$_SESSION['idUser']."', '" . $var_categories . "', '" . $var_ressources . "', '" . $var_relations . "', 3);";

            $return = $return . "</br> La requete ici : " . $requete_insert . "</br>";
            $return = $return . $conn->exec($requete_insert);
            return $return;
        }
        
        // Méthode pour afficher les titre_ressources des resosurces
        public function afficheDonnees($conn)
        {
            // Affiche le titre_ressource de l'article ainsi que sa date de création
            try{    
            $requete = $conn->query('SELECT ressources.id_ressource, description_ressource, titre_ressource, DATE_FORMAT(date_creation_ressource, \'%d/%m/%Y\') AS date_creation_ressource FROM ressources WHERE id_statut != 4 ORDER BY date_creation_ressource DESC;');
            }

            catch(PDOException $e){
                die($e->getMessage());
            }
            
            return $requete;
            $requete->closeCursor();
        }

    }
 ?>