<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class PromotionRepository extends EntityRepository{
    
    public function listeAllPromo(){
        $this->findAll();
    }
    
    public function addCodePromo($data = array()){
        $query = $this->getDb()->prepare("INSERT INTO promotion (code_promo, reduction) VALUES (:code_promo, :reduction)");
        $this->binder($query, $data);
        $result = $query->execute();
        return $result;
        
    }
    
    public function updateCodePromo(&$userData, $id){
        $query = $this->getDb()->prepare("UPDATE promotion set code_promo=:code_promo, reduction=:reduction WHERE id_promo='$id'");
        $this->binder($query,$userData);
        $result = $query->execute();
        return $result;
    }
    
    public function deletePromo($id){
        $query = $this->getDb()->prepare("DELETE FROM promotion WHERE id_promo='$id'");
        $query->execute();
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

