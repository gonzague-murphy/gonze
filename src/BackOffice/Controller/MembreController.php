<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE Component\UserSessionHandler;


class MembreController extends Controller{
    
    public $isConnected = false;
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
       if($this->isPostSet()!=false){
            $this->loginUser($_POST);
            $default = new DefaultController;
            $default->view->indexDisplay();
        }
    }
    
/*
 * Login : on nettoie, on lance la query, on fait l'erreur
 * propre si besoin
 * @params array($dataInput) tous les $_POST
 * @return object self:$user instance de la Classe Membre
 */
    public function loginUser($dataInput=array()){
        $myObj = $this->formValidation('loginQuery', $dataInput);
        if($myObj == false){
            echo $this->msg = "<div class='error'>Mauvaise combinaison de login/mot de passe</div>";
        }
        else{
            $this->userSession->initializeSession($myObj);
            echo "Hello, ".$myObj->pseudo;
         }
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
 * Fonction de suppression
 */
     public function allowDelete(){
             $queryTable = $this->getRepository('Membre');
             $queryTable->deleteMembre($_GET['id']);
             $this->listeAllAdmin();
     } 
    

    
     public function signUpForm(){
        $this->view->signUpForm();
    }
    
    public function loginDisplay(){
        $this->view->loginDisplay();
        
    }
    
    public function displayFicheDetail(){
        $me = UserSessionHandler::getUser();
        //var_dump($me);
        $this->view->displayFicheDetail($me);
    }
    
//fonction de test
    public function displayForAdmin(){
        $query = $this->getRepository('Membre');
        $result = $query->findAll();
        $this->view->displayForAdmin($result);
    }
    
    public function deconnexion(){
        \session_destroy();
        unset($_SESSION['user']);
        $refresh = new DefaultController;
        $refresh->indexDisplay();
    }
    
    
}
