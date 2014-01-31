<?php
namespace Entity;

class Promotion{
    public $id_promo;
    public $code_promo;
    public $reduction;
    
//::::::::::GETTERS:::::::::::
    
    public function getIdPromo(){
        return $this->id_promo;
    }
    
    public function getCodePromo(){
        return $this->code_promo;
    }
    
    public function getReduction(){
        return $this->reduction;
    }
}

