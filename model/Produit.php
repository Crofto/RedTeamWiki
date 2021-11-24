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
}
    
?>