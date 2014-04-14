<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE Component\UserSessionHandler;


class MembreController extends Controller{
/*
 * Fonctions de lancement
 */
    
   public function lanceSignUp(){
       if(isset($this->arrayPost)){
           //var_dump($this->arrayPost);
            $this->signUp();
            if(empty($this->msg)){
            $new = new DefaultController;
            $new->indexDisplay();
            }
            else{
                $this->view->loginDisplay();
            }
        }
    }
    
    public function lanceLogin(){
       if($this->isPostSet()!=false){
           var_dump($this->arrayPost);
            $this->loginUser($this->arrayPost);
            $default = new DefaultController;
            $default->indexDisplay();
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
            $this->msg = "<div class='error'>Mauvaise combinaison de login/mot de passe</div>";
        }
        else{
            $this->userSession->initializeSession($myObj);
         }
         echo $this->msg;
    }
        
    
/*
 * Fonction d'inscription
 * @params array($dataInput) tous les $_POST
 * @return object $this->user instance de la Classe Membre
 */

    public function signUp(){
        //var_dump($this->arrayPost);
        $this->clean($this->arrayPost);
        $testDoubles = $this->getRepository('Membre')->checkForDoubles($this->arrayPost);
        //var_dump($testDoubles);
        if($testDoubles == false){
            $this->checkForEmptyFields($this->arrayPost);
            $this->allowInsert($this->arrayPost);
           }
                
         else{
            $this->msg = "Pseudo/Email deja pris!<br/>Avez-vous <a href='#'>oublié votre mot de passe?</a>";
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
 * Delete
 */
     public function allowDelete(){
             $queryTable = $this->getRepository('Membre');
             $queryTable->deleteMembre($this->arrayGet['id']);
             $this->displayForAdmin();
     }
     
/*
 * Update
 */
     
     public function updateUser(){
         if(isset($this->arrayPost)){
             $this->getRepository('Membre')->updateMembre($this->arrayPost,$this->arrayGet['id']);
             $moi = $this->getRepository('Membre')->findById($this->arrayGet['id']);
             $this->userSession->initializeSession($moi);
             $this->displayFicheDetail();
         }
     }
     
/*
 * Display
 */
     
     public function updateProfil(){
        $me = UserSessionHandler::getUser();
        $this->view->updateForm($me);
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
