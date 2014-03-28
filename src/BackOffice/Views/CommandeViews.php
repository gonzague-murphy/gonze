<?php
namespace Backoffice\Views;
USE Views\Views;

class CommandeViews extends Views{
    
    public function panierDisplay($arg){
        $this->render('template_accueil.php', 'panier.php', array(
            'title'=>'glibette est une grosse enflure',
            'cart'=>$arg
        ));
    }
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args, $msg) {
        $this->render('template_accueil.php', 'recapcommande.php', array(
            'title'=>'test',
            'commande'=>$args,
            'msg'=>$msg
        ));
    }
    
    public function displayForAdmin($result){
        echo "";
    }
}

