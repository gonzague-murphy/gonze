<?php
namespace Entity;

class Newsletter{
    public $id_newsletter;
    public $id_membre;
    
    public function getIdNewsletter(){
        return $this->id_newsletter;
    }
    
    public function getIdMembre(){
        return $this->id_membre;
    }
}

