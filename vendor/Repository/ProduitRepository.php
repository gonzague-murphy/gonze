<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class ProduitRepository extends EntityRepository{
    
/*
 * check si le produit existe deja 
 * en comparant les dates d'arrivee
 * (on compare le titre des salles dans le controller)
 */
    
    public function checkForDoubles($userData = array()){
            $date_arrivee = $this->findByKey('date_arrivee', $userData);
            $id_salle = $this->findByKey('salle', $userData);
            $query = $this->getDb()->prepare("SELECT * FROM ".$this->getTableName()." WHERE date_arrivee='$date_arrivee' AND id_salle='$id_salle'");
            $query->execute();
            $result = $query->rowCount();
            if($result <=0){
                return false;
            }
            else{
                return true;
            } 
        }
    
/*
 * Add query
 * 
 */
        
    public function addProduit(&$userData){
         $query = $this->getDb()->prepare("INSERT INTO ".$this->getTableName()." (date_arrivee, date_depart, prix, id_salle, id_promo, etat) VALUES (:date_arrivee, :date_depart, :prix, :salle, :promo, :etat)");
         $this->binder($query,$userData);
         $result = $query->execute();
         return $result;
     }
   
/*
 * Update query qui va se charger de 
 * changer l'état des salles au moment de
 * la commande
 */
     public function updateProduit(&$userData, $id){
         $query = $this->getDb()->prepare("UPDATE produit SET date_arrivee=:date_arrivee, date_depart=:date_depart, prix=:prix, id_salle=:salle, id_promo=:promo, etat=:etat WHERE id_produit='$id'");
         $this->binder($query,$userData);
         $result = $query->execute();
         return $result;
     }
    
/*
 * DELETE query
 * 
 */
     public function deleteProduit($id){
         $query = $this->getDb()->prepare("DELETE FROM produit WHERE id_produit=$id");
         $query->execute();
     }
  
/*
 * Find by id
 * 
 */
     public function findById($id){
        $query = $this->getDb()->prepare("SELECT * FROM produit WHERE id_produit=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Produit');
        $query->execute();
        $result = $query->fetch();
        //var_dump($result);
        if(!$query){
            return false;
        }
        else{
            return $result;
        } 
     }
     
}
