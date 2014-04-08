<?php
namespace Backoffice\Views;
USE Views\Views;

class CommandeViews extends Views{
    
    public function panierDisplay($arg){
        $this->render('template_accueil.php', 'panier.php', array(
            'title'=>'Mon Panier',
            'cart'=>$arg
        ));
    }
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args) {
        $this->render('template_accueil.php', 'recapcommande.php', array(
            'title'=>'test',
            'commande'=>$args
        ));
    }
    
    public function displayForAdmin($result){
        echo "";
    }
}

