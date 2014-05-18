<?php
namespace Backoffice\Views;
USE Views\Views;

class CommandeViews extends Views{
    
    public function panierDisplay($arg, $msg=''){
        $this->render('template_accueil.php', 'panier.php', array(
            'title'=>'Mon Panier',
            'cart'=>$arg,
            'msg'=>$msg
        ));
    }
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail() {
        $this->render('template_accueil.php', 'recapcommande.php', array(
            'title'=>'Recapitulation de votre commande',
        ));
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'listecommande.php', array(
            'title'=> 'Toutes les commandes',
            'commandes'=>$result
        ));
    }
    
    public function recap($resume, $reduction){
        $this->render('template_accueil.php', 'applyPromo.php', array(
            'title'=>'Passer ma commande',
            'resume'=>$resume,
            'reduction'=>$reduction
        ));
    }
    
    public function mixDetail($result, $details, $years){
        $this->render('template_accueil.php', 'listecommande.php', array(
            'title'=> 'Toutes les commandes',
            'commandes'=>$result,
            'detail'=>$details,
                'years'=>$years
        ));
    }
}

