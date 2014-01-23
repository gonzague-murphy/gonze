<?php

namespace Manager;
USE Manager\PDOManager;
USE PDO;

class EntityRepository{
    
    private $db;
   
    
    protected function getDb(){
        
        if(!$this->db){
            
            return  $this->db = PDOManager::getInstance()->getPdo();
        }
    }
    
    public function getTableName(){
        
       return strtolower(str_replace(array('Repository\\','Repository'),'', get_called_class()));
    }
    
    
    
    public function findAll(){
        
        $query = $this->getDb()->prepare("SELECT * FROM ".$this->getTableName());
        
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.$this->getTableName());
        $query->execute();
        $result = $query->fetchAll();
        if(!$query){
            return false;
        }
        else{
            return $result;
        }
        
     }
     
     
     public function loginQuery($arg1,$arg2){
        $query = $this->getDb()->prepare("SELECT id_membre, pseudo, nom, prenom, email, ville, cp, adresse, statut FROM ".$this->getTableName()." WHERE pseudo='".$arg1."' AND mdp='".$arg2."'");
        //$query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Membre');
        $query->execute();
        $myObject= $query->fetch();
       
/*
 * Si la query ne passe pas, on fait une erreur propre
 */
        if(!$query){
           return false;
        }
/*
 * Sinon on attribue true à la variable témoin
 */
        else{           
            return $myObject;
        }
    }

   public function getEntity($entityName){
       $class = 'Entity\\'.$entityName;
       if(!isset($this->entity)){
           $this->entity = new $class;
       }
        return $this->entity;
   }
    


   

}