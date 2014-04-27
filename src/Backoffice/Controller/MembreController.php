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
           $this->verifSignUp();
            if(empty($this->msg)){
            $this->signUp();
            $new = new DefaultController;
            $new->indexDisplay();
            }
            else{
                $this->signUpForm();
            }
        }
    }
    
    public function insertAdmin(){
        if(isset($this->arrayPost)){
           $this->verifSignUp();
            if(empty($this->msg)){
            $this->getRepository('Membre')->insertNewAdmin($this->arrayPost);
            $this->welcomeNewAdmin($this->arrayPost['email'], $this->arrayPost['pseudo'], $this->arrayPost['mdp']);
            $this->view->signUpAdmin('Merci! Un email a été envoyé au nouvel administrateur afin de lui communiquer ses identifiants de connexion');
            }
            else{
                $this->view->signUpAdmin($this->msg);
            }
        }
    }
    
    public function verifSignUp(){
            $this->clean($this->arrayPost);
            $testDoubles = $this->getRepository('Membre')->checkForDoubles($this->arrayPost);
            if($testDoubles == false){
            $this->checkForEmptyFields($this->arrayPost);
            }
            else{
            $this->msg = "Pseudo/Email deja pris!<br/>Avez-vous <a href='#'>oublié votre mot de passe?</a>";
            } 
            echo $this->msg;
    }
    
    public function lanceLogin(){
       if($this->isPostSet()!=false){
            $this->loginUser($this->arrayPost);
            \Component\CookieBakery::atLogin($this->arrayPost);
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
    
    public function formValidation($fonction1, $data=array()){
        $this->clean($data);
        $this->msg = $this->checkForEmptyFields($data);
        if(empty($this->msg)){
            $table = explode('\\', get_called_class());
            $requestTable = str_replace('Controller','',$table[2]);
            $queryTable = $this->getRepository($requestTable);
            $result = $queryTable->$fonction1($data);
            return $result;
        }
    }
        
    
/*
 * Fonction d'inscription
 * @params array($dataInput) tous les $_POST
 * @return object $this->user instance de la Classe Membre
 */

    public function signUp(){
        /*$this->clean($this->arrayPost);
        $testDoubles = $this->getRepository('Membre')->checkForDoubles($this->arrayPost);
        if($testDoubles == false){
            $this->checkForEmptyFields($this->arrayPost);*/
            $this->allowInsert($this->arrayPost);
           /*}*/
                
         /*else{
            $this->msg = "Pseudo/Email deja pris!<br/>Avez-vous <a href='#'>oublié votre mot de passe?</a>";
          } 
         echo $this->msg;*/
    }
    
    public function allowInsert($data = array()){
        $queryTable = $this->getRepository('Membre');
        $myResult = $queryTable->signUpQuery($data);
        if($myResult == false){
            echo "perdu!";
          }
        else{
            $myObject = $queryTable->loginQuery($data);
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
 * Send new password
 */
     public function mailPwd(){
         //var_dump($this->arrayPost);
         $this->clean($this->arrayPost);
         $emailExists = $this->getRepository('Membre')->checkIfEmailExists($this->arrayPost['email']);
         if($emailExists == false){
             $this->msg = "Pas d'utilisateur enregistré avec cette adresse!";
             $this->view->forgoPwd($this->msg);
             
         }
         else{
            $pwd = $this->randomPwd();
            $this->mailLostPwd($this->arrayPost['email'], $pwd);
            $this->getRepository('Membre')->updatePassword(md5($pwd), $emailExists['id_membre']);
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
    
    public function signUpFormAdmin(){
        $this->view->signUpAdmin();
    }
    
    public function loginDisplay(){
        $this->view->loginDisplay();
        
    }
    
    public function lostPwdForm(){
        $rien = '';
        $this->view->forgoPwd($rien);
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
