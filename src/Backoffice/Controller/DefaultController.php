<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DefaultController extends Controller{
    
    public function __construct(){
        $this->avis = new AvisController;
        $this->membre = new MembreController;
        $this->commande = new CommandeController;
        $this->salle = new SalleController;
        $this->detail = new DetailsCommandeController;
        $this->view = new \Backoffice\Views\DefaultViews;
        $this->arrayPost = $_POST;
    }
    
   
    public function indexDisplay($msg=''){
        $cont = new ProduitController;
        $salle = $cont->displayMostRecent();
        $this->view->indexDisplay($salle, $msg);
    }
    
    public function assembleStatsAdmin(){
        $bestRanked = $this->avis->topVenuesAvg();
        $mostSold = $this->salle->listMostSoldAdmin();
        $mostQty = $this->detail->topProductQty();
        $mostExp = $this->commande->mostExpensive();
        $this->view->displayStatsAdmin($bestRanked, $mostSold, $mostQty, $mostExp);
    }
    
    public function mentionLegales(){
        $this->view->displayMentionsLegales();
    }
    
    public function displayCgv(){
        $this->view->displayCgv();
    }
    
    public function displayAbout(){
        $this->view->displayAbout();
    }
    
    public function contactForm(){
        $this->view->displayContactForm('');
    }
    
    public function getSendersMail(){
        $user = \Component\UserSessionHandler::getUser();
        if(isset($user)){
            return $mail = $user->email;
        }
        else{
            return $mail = $this->arrayPost['expediteur'];
        }
    }
    
    public function makeContactMail(){
        if(isset($this->arrayPost)){
            $this->msg = $this->checkForEmptyFields($this->arrayPost);
            $errors = array_filter($this->msg);
            if(empty($errors)){
                $this->clean($this->arrayPost);
                $sender = $this->getSendersMail();
                $this->makeLetterAdmin($sender, $this->arrayPost['sujet'], $this->arrayPost['message']);
                $this->contactOk();
            }
            else{
                $this->view->displayContactForm($errors);
            }
        }
        
    }
    
    public function makeLetterAdmin($from, $subject, $letter){
        $to = 'loki-salle@alwaysdata.net';
        $subject = $subject;
        $message = '<html>
        <head>
        <title>'.$subject.'</title>
        </head>
        <body>
        '.html_entity_decode($letter).'
        </body>
        </html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'From: '.$from. "\r\n";

    $mail = mail($to, $subject, $message, $headers); //marche

    if($mail){
        return true;
    }
    else{
        return false;
        }
    }
    
/*
 * Sent contact form
 */
    
    public function contactOk(){
        $this->view->okContact();
    }
/*
 * Page does not exist
 */
    
    public function unknownPage(){
        $this->view->noSuchPage();
    }
    
/*
 * Error 404
 */

/*
 * Error 503
 */
    
}


