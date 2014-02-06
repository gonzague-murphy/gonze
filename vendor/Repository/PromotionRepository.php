<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class PromotionRepository extends EntityRepository{
    
    public function listeAllPromo(){
        $this->findAll();
    }
    
    public function findById($id){
        $query = $this->getDb()->prepare("SELECT * FROM promotion WHERE id_promo=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Promotion');
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

