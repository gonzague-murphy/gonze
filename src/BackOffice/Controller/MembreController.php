<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE Component\UserSessionHandler;

class MembreController extends Controller{
    
    public $isConnected = false;
    protected $view;
    
//initialise le panier à l'instanciation
    public function __construct(){
        $this->userSession = new UserSessionHandler;
        $this->castUser();
        $this->view = new \Backoffice\Views\MembreViews();
       
    }
    
    public function castUser(){
        if(isset($_SESSION['user'])){
            $this->user = new \Entity\Membre;
            foreach($_SESSION['user'] as $key=>$value){
                $this->user->$key = $value;
            }
            return $this->user;
        }
        var_dump($this);
    }
    
    
/*
 * Fonctions de lancement
 */
    
   public function lanceSignUp(){
       if(isset($_POST)){
            $this->signUp($_POST);
            //var_dump($this->msg);
            if(empty($this->msg)){
            $this->defaultDisplay();
            }
            else{
                $this->loginDisplay();
            }
            //var_dump($_SESSION);
        }
    }
    
    public function lanceLogin(){
       if(isset($_POST)){
            $this->loginUser($_POST);
            //$this->initializeSession();
            $this->defaultDisplay();

        }
        
    }
    
/*
 * Login : on nettoie, on lance la query, on fait l'erreur
 * propre si besoin
 * @params array($dataInput) tous les $_POST
 * @return object self:$user instance de la Classe Membre
 */
    public function loginUser($dataInput=array()){
        $this->clean($dataInput);
        $queryTable = $this->getRepository('Membre');
        $myObj = $queryTable->loginQuery($dataInput);
        if($myObj == false){
            echo $this->msg = "<div class='error'>Mauvaise combinaison de login/mot de passe</div>";
        }
        else{
            $this->userSession->initializeSession($myObj);
            echo "Hello, ".$myObj->pseudo;
         }
         //var_dump($this->user);
    }
        
    
/*
 * Fonction d'inscription
 * @params array($dataInput) tous les $_POST
 * @return object $this->user instance de la Classe Membre
 */

    public function signUp($data =array()){
            $this->msg = $this->checkForEmptyFields($data);
            if(empty($this->msg)){    
                $this->clean($data);
                $testDoubles = $this->checkDoubleEntry('Membre',$data);
                if($testDoubles == 0){
                    $this->clean($data);
                    $this->allowInsert($data);
                }
                
                else{
                    $this->msg = "Pseudo/Email deja pris!<br/>Avez-vous <a href='#'>oublié votre mot de passe?</a>";
                }
            }
            echo $this->msg;
    }
    
    public function allowInsert($data = array()){
        $queryTable = $this->getRepository('Membre');
        $myResult = $queryTable->signUpQuery($data);
        if($myResult == false){
            echo "perdu!";
          }
        else{
            $myObject = $queryTable->loginQuery($data);
            //var_dump($myObject);
            if($myObject == false){
                echo "non";
            }
            else{
            $this->userSession->initializeSession($myObject);
            }
          }
    }
    
/*
 * Gère l'insertion et l'initialisation de $this->user
 */
    
    
    public function isPostSet($data = array()){
       foreach($data as $key=>$value){
           if($key == 'submit' && $value !== ''){
               return true;
           }
           else{
               return false;
           }
       }
    }
    
    /*public function listeAllAdmin(){
        //var_dump($this->userHandler);
        $queryTable = $this->getRepository('Membre');
        $result = $queryTable->findAll();
        $this->render('template_accueil.php', 'membre.php', array(
            'title'=>'Lokisalle',
            'membres'=>$result
        ));
    }*/
/*
 * Fonction de suppression
 */
     public function allowDelete(){
             $queryTable = $this->getRepository('Membre');
                 $queryTable->deleteMembre($_GET['id']);
                 $this->listeAllAdmin();
     } 
    
//fonction de test

    public function defaultDisplay(){
        $this->render('template_accueil.php','defaultPlaceholder.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
     public function signUpDisplay(){
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
    
    public function displayMe(){
        $me = $this->user;
        $this->render('template_accueil.php', 'profil.php', array(
            'title'=>'Mon Profil',
            'mesInfos'=>$me
        ));
    }
    
//fonction de test
    public function listeAllAdmin(){
        $query = $this->getRepository('Membre');
        $result = $query->findAll();
        $this->view->displayForAdmin($result);
    }
    
    public function deconnexion(){
        \session_destroy();
        unset($_SESSION['user']);
        $this->defaultDisplay();
    }
    
    
}
