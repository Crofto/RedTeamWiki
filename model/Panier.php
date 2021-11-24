<?php


class Panier{
    public $produits = array();

    public function addProduit(Produit $prod){
        array_push($this->produits, $prod);
    }

    public function addProduitId(int $id){
        $prodAjout = null;
        foreach ($this->produits as $prod){
            if ( $prod->id == $id){
                $prodAjout = $prod;
                break;
            }
        }
        if ($prodAjout != null)
            array_push($this->produits, $prodAjout);
        else
            echo "wtf";
    }
    
    public function removeProduit(Produit $prod){
        if (in_array($prod, $this->produits)){
            $index = array_search($prod, $this->produits);     
            unset($this->produits[$index]);
        }
    }

    public function removeProduitId(int $id){
        $prodRecherche = null;
        foreach ($this->produits as $prod){
            if ( $prod->id == $id){
                $prodRecherche = $prod;
                break;
            }
        }
        if ($prodRecherche != null)
            $this->removeProduit($prodRecherche);
        else
            echo "wtf";
    }

    public function clearProduit(Produit $prod){
        while (in_array($prod, $this->produits)){
            $index = array_search($prod, $this->produits);
            unset($this->produits[$index]);
        }
    }

    public function clearProduitId(int $id){
        foreach ($this->produits as $prod){
            if ( $prod->id == $id){
                $prodRecherche = $prod;
                break;
            }
        }
        $this->clearProduit($prodRecherche);
    }
 
    public function getSousTotal(){
        $total = 0;
        foreach($this->produits as $prod){
            $total += $prod->prix;
        }
        return $total;
    }

    public function getNombreProduits(){
        return count($this->produits);
    }


}
    
?>