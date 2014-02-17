<?php
namespace Backoffice\Views;
USE Views\Views;

class MembreViews extends Views{
    
    
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args) {
        $this->render('template_accueil.php', 'profil.php', array(
            'title'=>'Mon Profil',
            'mesInfos'=>$args
        ));
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'membre.php', array(
            'title'=>'Lokisalle',
            'membres'=>$result
        ));
    }

//:::::::::FORM DISPLAY::::::::::::::::
//:::::::::::::::::::::::::::::::::::::
    
     public function signUpForm(){
        $this->render('template_accueil.php','formsignup.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
    public function loginDisplay(){
        $this->render('template_accueil.php','loginform.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
        
    }
}