<?php
namespace Repository;
USE Manager\EntityRepository;

class ProduitRepository extends EntityRepository{
    
/*
 * check si le produit existe deja 
 * en comparant les dates d'arrivee
 * (on compare le titre des salles dans le controller)
 */
    
    public function checkForDoubles($userData = array()){
            $date_arrivee = $this->findByKey('date_arrivee', $userData);
            $query = $this->getDb()->prepare("SELECT * FROM ".$this->getTableName()." WHERE date_arrivee='$date_arrivee'");
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
         $query = $this->getDb()->prepare("INSERT INTO ".$this->getTableName()." (date_arrivee, date_depart, prix, id_salle, id_promo, etat) VALUES (".date('d-m-Y', strtotime(":date_arrivee")).", ".date('d-m-Y', strtotime(":date_depart")).", :prix, :id_salle, :id_promo, :etat)");
         $this->binder($query,$userData);
         $result = $query->execute();
         return $result;
     }
   
/*
 * Update query qui va se charger de 
 * changer l'état des salles au moment de
 * la commande
 * 
 */
    
/*
 * DELETE query
 * 
 */
  

     
}
