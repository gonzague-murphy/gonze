<?php
namespace Backoffice\Views;
USE Views\Views;

class CommandeViews extends Views{
    
    public function panierDisplay($arg){
        $this->render('template_accueil.php', 'panier.php', array(
            'cart'=>$arg
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
}

