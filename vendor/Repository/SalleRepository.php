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
     
     public function updateSalle(&$userData, $id){
         $query = $this->getDb()->prepare("UPDATE salle SET pays=:pays, ville=:ville, adresse=:adresse, cp=:cp, titre=:titre, description=:description, photo=:photo, capacite=:capacite WHERE id_salle='$id'");
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
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.$this->getTableName());
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
         $query = $this->getDb()->prepare("SELECT s.titre, p.id_produit from salle s, produit p WHERE s.id_salle=p.id_salle");
         $query->setFetchMode(PDO::FETCH_ASSOC);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
         
     }
}

