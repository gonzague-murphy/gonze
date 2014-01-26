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
        
        else{
            return $this->db;
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
     
     
     public function binder($query, $userData = array()){
        if(!empty($userData) && is_array($userData)){
            foreach($userData as $key=>$value){
                 if($key !='submit'){
                    $query->bindValue(":$key",$value);
                 }
            }
        }
            else{
             echo "Rien à bind!";
         }       
    }
     
/*
 * Fonction recherche par id
 */
     
 
     
/*
 * Fonction d'insert générale
 */
     


   


}