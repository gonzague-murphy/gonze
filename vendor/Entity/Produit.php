<?php

namespace Entity;
class Produit{
    public $id_produit;
    public $date_arrivee;
    public $date_depart;
    public $prix;
    public $id_salle;
    public $id_promo;
    
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
//::::::::::::::::GETTERS::::::::::::::
    
    public function getIdProduit(){
        return $this->id_produit;
    }
    
    public function getDateArrivee(){
        return $this->date_arrivee;
    }
    
    public function getDateDepart(){
        return $this->date_depart;
    }
    
    public function getPrix(){
        return $this->prix;
    }
    
    public function getIdSalle(){
        return $this->id_salle;
    }
    
    public function getIdPromo(){
        return $this->id_promo;
    }
}