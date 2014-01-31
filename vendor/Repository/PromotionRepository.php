<?php
namespace Repository;
USE Manager\EntityRepository;

class PromotionRepository extends EntityRepository{
    
    public function listeAllPromo(){
        $this->findAll();
    }
}

