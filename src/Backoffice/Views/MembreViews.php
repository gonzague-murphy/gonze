<?php
namespace Backoffice\Views;
USE Views\Views;

class MembreViews extends Views{
    
    
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args, $orders) {
        $this->render('template_accueil.php', 'profil.php', array(
            'title'=>'Mon Profil',
            'mesInfos'=>$args,
            'orders'=>$orders
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
    
    public function signUpAdmin($msg){
        $this->render('template_accueil.php', 'formsignupadmin.php', array(
            'title'=>'Ajouter un membre',
            'msg'=>$msg
        ));
    }
    
    public function newAdminOk(){
        $this->render('template_accueil.php', 'thankyou.php', array(
            'title'=>'Nouvel admin',
            'msg'=>'Un email a été envoyé au nouvel administrateur afin de lui communiquer ses identifiants de connexion'
        ));
    }
    
    public function lostPwd(){
        $this->render('template_accueil.php', 'thankyou.php', array(
            'title'=>'Mot de passe oublié',
            'msg'=>'Merci, nous vous avons envoyé un mail avec un nouveau mot de passe temporaire. Il vous est fortement conseillé d\'en changer.'
        ));
    }
    
    public function updateForm($arg, $msg){
        $this->render('template_accueil.php', 'updateprofil.php', array(
            'title'=>'Modifier mes informations',
            'user'=>$arg,
            'msg'=>$msg
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
    
    public function justLogin($msg){
        $this->partialRender('loginformSolo.php', array(
            'msg'=>$msg
        ));
    }
    
    public function justSignUp($msg){
        $this->partialRender('formsignup.php', array(
            'msg'=>$msg
        ));
    }
}