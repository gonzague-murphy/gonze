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
     
     


   


}