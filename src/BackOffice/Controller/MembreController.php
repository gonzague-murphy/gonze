<?php
namespace Backoffice\Controller;
USE Controller\Controller;


class MembreController extends Controller{
    
    public $user;
    public $isConnected = false;
    
//initialise le panier à l'instanciation
    
    public function __construct(){
        $this->initializeCart();
    }
    
    
/*
 * Fonctions de lancement
 */
    
   public function lanceSignUp(){
       if(isset($_POST)){
            $this->signUp($_POST);
        }
       //$this->defaultDisplay();
    }
    
    public function lanceLogin(){
       if(isset($_POST)){
            $this->loginUser($_POST);
            $this->initializeSession();
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
        //var_dump($myObj);
        if($myObj == false){
            echo $this->msg = "<div class='error'>Mauvaise combinaison de login/mot de passe</div>";
        }
        else{
            $this->user = $myObj;
            echo "Hello, ".$this->user->pseudo;
         }
        return $this->user;
    }
        
    
/*
 * Fonction d'inscription
 * @params array($dataInput) tous les $_POST
 * @return object $this->user instance de la Classe Membre
 */

    public function signUp($data =array()){
            $this->checkForEmptyFields($data);
            if($this->msg ==''){    
                $this->clean($data);
                $testDoubles = $this->checkDoubleEntry($data);
                if($testDoubles == 0){
                    $this->clean($data);
                    $this->allowInsert($data);
                }
                
                else{
                    echo "Pseudo/Email deja pris!<br/>Avez-vous <a href='#'>oublié votre mot de passe?</a>";
                }
            }
            else{
                echo $this->msg;
            }
    }
 
/*
 * Check le retour de la query, initialise $this->user 
 * et $_SESSION
 */
    
    public function initUser($varObject){
            //var_dump($this->user);
            //$this->isConnected = true;
            /*if(empty($this->user)){
                return $this->user = $varObject;
            }
            else{
                return $this->user;
            }*/
            $this->msg = "<h1>Hello ".$this->user->pseudo."</h1>";
            $this->initializeSession();
            //return $this->user;
    }
    
//Session et panier
    
     public function initializeSession(){
             $array = get_object_vars($this->user);
             $this->clean($array);
             foreach($array as $key=>$value){
                 $_SESSION['user'][$key] = $value;
             }
             //var_dump($_SESSION);
         
         //$this->initializeCart();
         //return $this->user; 
      }
      
    public function initializeCart(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['titre'] = array();
            $_SESSION['panier']['id_article'] = array();
            $_SESSION['panier']['quantite'] = array();
            $_SESSION['panier']['prix'] = array();
		}
	return true;
}

/*
 * Select query
 */
    public function checkDoubleEntry($data = array()){
        $queryTable = $this->getRepository('Membre');
        $test = $queryTable->checkForDoubles($data);
        return $test;
    }
    
/*
 * Gère l'insertion et l'initialisation de $this->user
 */
    
    public function allowInsert($data = array()){
        $queryTable = $this->getRepository('Membre');
        $myResult = $queryTable->signUpQuery($data);
        if($myResult == false){
            echo "perdu!";
          }
        else{
            $myObject = $queryTable->loginQuery($data);
            $this->initUser($myObject);
          }
    }
    
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

/*
 * Fonction d'update
 */

/*
 * Fonction de suppression
 */
      
    
//fonction de test

    public function defaultDisplay(){
        $this->render('template_accueil.php','defaultPlaceholder.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
     public function signUpDisplay(){
        $this->render('template_accueil.php','form.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
    public function loginDisplay(){
        /*var_dump($_POST);
        if($this->userIsConnected() == false){
        header('location:index.php');
            
        }*/
       
        $this->render('template_accueil.php','loginform.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
        
    }
    
//fonction de test
    public function displayMembres(){
        
        $membre = $this->getRepository('Membre');
        $membres = $membre->getAllMembers();
        
            $this->render('layout.php','membre.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',
            'membres'=>$membres
        ));
    }
    
    
}
