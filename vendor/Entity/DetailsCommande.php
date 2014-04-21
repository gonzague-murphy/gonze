<?php
namespace Entity;

class DetailsCommande{
    public $id_details_commande;
    public $id_commande;
    public $id_produit;
    
   public function setIdDetailsCommande($id){
       return $this->id_details_commande = $id;
   }
   
   public function setIdCommande($id){
       return $this->id_commande = $id;
   }
   
   public function setIdProduit($id){
       return $this->id_produit = $id;
   }
}
