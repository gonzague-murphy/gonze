<?php
namespace Backoffice\Views;
USE Views\Views;

class DefaultViews extends Views{
    
    public function indexDisplay(){
        $this->render('template_accueil.php','defaultPlaceholder.php', array(
            'title'=>'Vous etes sur l\'index'
        ));
    }
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args) {
        echo "";
    }
    
    public function displayForAdmin($result){
        echo "";
    }
    
    public function panierDisplay($arg){
        $this->render('template_accueil.php', 'panier.php', array(
            'cart'=>$arg
        ));
    }
}

