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
            'title'=>'Tous les membres',
            'membres'=>$result
        ));
    }

//:::::::::FORM DISPLAY::::::::::::::::
//:::::::::::::::::::::::::::::::::::::
    
    public function signUpForm($msg=''){
        $this->render('template_accueil.php','formsignup.php',array(
            'title'=>'S\'inscrire',
            'msg'=>$msg
        ));
    }
    
    public function signUpAdmin($msg=''){
        $this->render('template_accueil.php', 'formsignupadmin.php', array(
            'title'=>'Ajouter un membre',
            'msg'=>$msg
        ));
    }
    
    public function updateForm($arg){
        $this->render('template_accueil.php', 'updateprofil.php', array(
            'user'=>$arg
        ));
    }
    
    public function forgoPwd($msg){
        $this->render('template_accueil.php', 'pwdforgotten.php', array(
           'title'=>'Mot de passe oublié',
            'msg'=>$msg
        ));
    }
    
    public function loginDisplay(){
        $this->render('template_accueil.php','loginform.php',array(
            'title'=>'Connectez-vous',
        ));
        
    }
    
    public function justLogin(){
        $this->partialRender('loginformSolo.php', array());
    }
}