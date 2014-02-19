<?php
namespace Entity;

class Commande{
    protected $id_commande;
    protected $montant;
    protected $id_membre;
    protected $date;
    
    public function getIdCommande(){
        return $this->id_commande;
    }
    
    public function getMontant(){
        return $this->montant;
    }
    
    public function getIdMembre(){
        return $this->id_membre;
    }
    
    public function getDate(){
        return $this->date;
    }
    
    public function setIdCommande($id){
        return $this->id_commande = $id;
    }
    
    public function setMontant($montant){
        return $this->montant = $montant;
    }
    
    public function setDate($date){
        return $this->date = $date;
    }
    
}
