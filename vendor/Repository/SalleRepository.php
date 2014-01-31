<?php

namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class SalleRepository extends EntityRepository{
    
    public function checkForDoubles($userData = array()){
            $titre = $this->findByKey('titre', $userData);
            $query = $this->getDb()->prepare("SELECT titre FROM ".$this->getTableName()." WHERE titre='$titre'");
            $query->execute();
            $result = $query->rowCount();
            if(!$query){
                return false;
            }
            else{
                return $result;
            } 
        }
        
     public function addSalle(&$userData){
         $query = $this->getDb()->prepare("INSERT INTO salle (pays, ville, adresse, cp, titre, description, photo, capacite) VALUES (:pays, :ville, :adresse, :cp, :titre, :description, :photo, :capacite)");
         $this->binder($query,$userData);
         $result = $query->execute();
         return $result;
     }
     
     public function deleteSalle($id_salle){
         $query = $this->getDb()->prepare("DELETE FROM salle WHERE id_salle='$id_salle'");
         $query->execute();
     }
     
     public function findById($id){
        $query = $this->getDb()->prepare("SELECT * FROM salle WHERE id_salle=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Salle');
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
     
     public function selectHasProduct(){
         $query = $this->getDb()->prepare("SELECT s.titre from salle s INNER JOIN produit p ON s.id_salle=p.id_salle GROUP BY p.id_salle");
         $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Salle');
         $query->execute();
         $result = $query->fetchAll();
         return $result;
         
     }
}

