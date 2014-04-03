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
        $query = $this->getDb()->prepare("SELECT * FROM produit p, salle s, promotion pro WHERE p.id_produit=$id AND p.id_salle=s.id_salle");
        $query->setFetchMode(PDO::FETCH_ASSOC);
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
     
/*
 * Query Select generale
 */
     
     public function selectHasProduct(){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, p.id_salle from salle s, produit p WHERE s.id_salle=p.id_salle");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;  
     }
     
/*
 * Query select par date d'ajout
 */
     
     public function selectMostRecent(){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, s.capacite, s.ville, p.id_salle FROM salle s, produit p WHERE s.id_salle=p.id_salle ORDER BY p.id_produit DESC LIMIT 0,3;");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
     }

/*
 * Query select par ville
 */
     
     public function selectByCity($city){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, s.capacite, s.ville, p.id_salle FROM salle s, produit p WHERE s.id_salle=p.id_salle AND s.ville='".$city."' ORDER BY p.id_produit DESC;");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         var_dump($result);
         return $result;
     }
/* echo "SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, s.capacite, s.ville, p.id_salle FROM salle s, produit p WHERE s.id_salle=p.id_salle AND s.ville='".$city."' ORDER BY p.id_produit DESC;"*/
     
/*
 * Query select par capacite
 */

     public function selectByCapacity($capacity){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, s.capacite, s.ville, p.id_salle FROM salle s, produit p WHERE s.id_salle=p.id_salle AND s.ville='".$capacity."' ORDER BY p.id_produit DESC;");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
     }
     

}
