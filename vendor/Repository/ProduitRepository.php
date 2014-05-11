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
    
    public function checkForDoubles($id_salle, $date_arrivee){
            //var_dump($id_salle, $date_arrivee);
            $query = $this->getDb()->prepare("SELECT * FROM produit WHERE id_salle='$id_salle' AND (date_arrivee LIKE '$date_arrivee%' OR date_depart LIKE '$date_arrivee%')");
            $query->execute();
            $result = $query->rowCount();
            if($result !== 0){
                $obj = $query->fetchAll(PDO::FETCH_CLASS, "\Entity\\"."Produit");
                return $obj;
            }
            else{
                return $result;
            }
        }
        
/*
 * Add query
 * 
 */
        
    public function addProduit($userData){
         $query = $this->getDb()->prepare("INSERT INTO ".$this->getTableName()." (date_arrivee, date_depart, prix, id_salle, id_promo, etat) VALUES (:date_arrivee, :date_depart, :prix, :salle, :promo, :etat)");
         $this->Objectbinder($query,$userData);
         $result = $query->execute();
         return $result;
     }
   
/*
 * Update query qui va se charger de 
 * changer l'état des salles au moment de
 * la commande
 */
     public function updateProduit($userData, $id){
         $query = $this->getDb()->prepare("UPDATE produit SET date_arrivee=:date_arrivee, date_depart=:date_depart, prix=:prix, id_promo=:promo, etat=:etat WHERE id_produit='$id'");
         $this->objectBinderForUpdates($query,$userData);
         //var_dump($userData);
         $result = $query->execute();
         return $result;
     }
     
     public function updateState($id){
         $query = $this->getDb()->prepare("UPDATE produit SET etat='1' WHERE id_produit='$id'");
         $result = $query->execute();
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
        $query = $this->getDb()->prepare("SELECT * FROM produit p INNER JOIN salle s ON p.id_salle=s.id_salle INNER JOIN promotion pro ON pro.id_promo=p.id_promo WHERE p.id_produit=$id;");
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
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart FROM salle s, produit p WHERE s.id_salle=p.id_salle AND p.etat=0 AND p.date_arrivee > CURDATE()");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;  
     }
     
/*
 * Query tous produits admin
 */
     
     public function selectHasProductAdmin(){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart, p.etat FROM salle s, produit p WHERE s.id_salle=p.id_salle");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;  
     }
/*
 * Query select par date d'ajout
 */
     
     public function selectMostRecent(){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart FROM salle s, produit p WHERE s.id_salle=p.id_salle AND p.etat=0 ORDER BY p.id_produit DESC LIMIT 0,3;");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
     }

/*
 * Query select par ville
 */
     
     public function selectByCity($city){
         if($city==''){
             return $result = $this->selectHasProduct();
         }
         else{
            $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart FROM salle s, produit p WHERE s.id_salle=p.id_salle AND s.ville='".$city."' AND p.etat=0 ORDER BY p.id_produit DESC;");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
         }
     }
/* echo "SELECT s.titre, s.photo, s.description, p.id_produit, p.prix, s.capacite, s.ville, p.id_salle FROM salle s, produit p WHERE s.id_salle=p.id_salle AND s.ville='".$city."' ORDER BY p.id_produit DESC;"*/
     
/*
 * Query select par capacite
 */

     public function selectByState($etat){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart, p.etat FROM salle s, produit p WHERE s.id_salle=p.id_salle AND p.etat='".$etat."' ORDER BY p.id_produit DESC;");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
     }
     
/*
 * Suggestions
 */
     
     public function findSimilar($city, $id){
         $query = $this->getDb()->prepare("SELECT s.titre, s.photo, s.ville, s.capacite, p.id_produit, p.prix, p.id_salle, p.date_arrivee, p.date_depart, p.etat FROM salle s INNER JOIN  produit p ON s.id_salle=p.id_salle WHERE s.ville='$city' AND p.id_produit != $id AND p.etat != 1 LIMIT 3");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
     }
     
/*
 * Query recherche principale
 */
     
     public function mainSearchOne($mois, $annee){
         $query = $this->getDb()->prepare("SELECT id_produit FROM produit WHERE date_arrivee LIKE '%$annee-$mois%';");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         return $result = $query->fetchAll();
         
     }
     
     public function mainSearchTwo($id, $keyWord){
         $query = $this->getDb()->prepare("SELECT * FROM produit p INNER JOIN salle s ON p.id_salle=s.id_salle WHERE p.id_produit=$id AND s.ville LIKE '%$keyWord%';");
         $query->setfetchMode(PDO::FETCH_CLASS, "\Entity\\"."Produit");
         $query->execute();
         return $result = $query->fetchAll(); 
     }
/******************************************************************************************/
     
     public function objectBinder($query, \Entity\Produit $prod){
            $cles = array('submit', 'id_produit', 'id_salle', 'id_promo');
            foreach($prod as $key=>$value){
                if(!in_array($key, $cles)){
                    $query->bindValue(":$key",$value);
                }
            }   
        }
        
    public function objectBinderForUpdates($query, \Entity\Produit $prod){
            $cles = array('submit', 'id_produit', 'id_salle', 'id_promo', 'salle');
            foreach($prod as $key=>$value){
                if(!in_array($key, $cles)){
                    $query->bindValue(":$key",$value);
                }
            }
    }
     

}
