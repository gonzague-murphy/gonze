<?php

namespace Entity;
class Salle{
    public $id_salle;
    public $pays;
    public $ville;
    public $adresse;
    public $cp;
    public $titre;
    public $description;
    public $photo;
    public $capacite;
    
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
//::::::::::GETTERS:::::::::::
    
    public function getIdSalle(){
        return $this->id_salle;
    }
    
    public function getTitre(){
        return $this->titre;
    }
    
//::::::::::SETTERS::::::::::::
    
    public function setPays($pays){
        return $this->pays = $pays;
    }
    
    public function setVille($ville){
        return $this->ville = $ville;
    }
    
    public function setAdresse($adresse){
        return $this->adresse = $adresse;
    }
    
    public function setCp($cp){
        return $this->cp = $cp;
    }
    
    public function setTitre($titre){
        return $this->titre = $titre;
    }
    
    public function setDescription($description){
        return $this->description = $description;
    }
    
    public function setPhoto($photo){
        return $this->photo = $photo;
    }
    
    public function setCapacite($capacite){
        return $this->capacite = $capacite;
    }
}

