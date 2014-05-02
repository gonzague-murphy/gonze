<?php
namespace Backoffice\Views;
USE Views\Views;

class PromotionViews extends Views{
    public function displayListe($args){
        echo "";
    }
    
    public function displayForAdmin($args){
        $this->render('template_accueil.php', 'promo.php', array(
            'title'=>'Gérer les codes Promo',
            'promo'=>$args
        ));
    }
    
//::::::::::FORMULAIRES:::::::::::::
//::::::::::::::::::::::::::::::::::
    
    public function addPromoForm(){
        $this->render('template_accueil.php', 'promoform.php', array(
            'title'=>'Ajouter une Promotion'
        ));
    }
    
    public function updatePromoForm($args){
        $this->render('template_accueil.php', 'promotionupdateform.php', array(
            'title'=>'Modifier une Promotion',
            'var'=>$args
        ));
    }
}

