<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class MembreController extends Controller{
    
    public $isConnected = false;
    protected $msg;
    public $user;
    
    public function __construct(){
        $this->initializeCart();
    }
    
    public function displayMembres(){
        
        $membre = $this->getRepository('Membre');
        $membres = $membre->getAllMembers();
        
            $this->render('layout.php','membre.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',
            'membres'=>$membres
        ));
    }
    
    
/*
 * Login : on nettoie, on lance la query, on fait l'erreur
 * propre si besoin
 * @params array($dataInput) tous les $_POST
 * @return object $this->user instance de la Classe Membre
 */
    public function loginUser($dataInput=array()){
        $this->clean($dataInput);
        $queryTable = $this->getRepository('Membre');
        $myObj = $queryTable->loginQuery($dataInput['pseudo'],$dataInput['mdp']);
        //var_dump($myObj);
        if($myObj == false){
            echo $this->msg = "<div class='erreur'>Mauvaise combinaison de login/mot de passe</div>";
        }
        else{
            $this->isConnected = true;
            $this->user = $myObj;
            echo $this->msg = "<h1>Hello</h1>";
            //var_dump($this->user);
            $this->initializeSession();
            return $this->user;
        
         }
        return $this->user;
    }

    public function defaultDisplay(){
        $this->render('template_accueil.php','membre.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
     public function initializeSession(){
         if($this->isConnected == true){
             $array = get_object_vars($this->user);
             $this->clean($array);
             foreach($array as $key=>$value){
                 $_SESSION['user'][$key] = $value;
             }
             //var_dump($_SESSION);
         }
         $this->initializeCart();
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
      
        
   
    
        
    
    

}