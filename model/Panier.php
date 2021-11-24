<?php

include("./model/Produit.php");

class Panier{
    public $produits = array();

    public function addProduit(Produit $prod){
        array_push($this->produits, $prod);
    }
    
    public function removeProduit(Produit $prod){
        $index = array_search($prod, $this->produits);
        \array_splice($produits, $index, $index);
    }

    public function clearProduit(Produit $prod){
        $index = array_search($prod, $this->produits);
        while ($index>=0){
            \array_splice($produits, $index, $index);
            $index = array_search($prod, $this->produits);
        }
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