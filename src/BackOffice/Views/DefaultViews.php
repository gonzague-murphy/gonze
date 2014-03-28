<?php
namespace Backoffice\Views;
USE Views\Views;

class DefaultViews extends Views{
    
    public function indexDisplay($salles){
        $this->render('template_accueil.php','defaultPlaceholder.php', array(
            'title'=>'Vous etes sur l\'index',
            'salle'=>$salles
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

