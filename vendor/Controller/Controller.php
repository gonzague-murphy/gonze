<?php

namespace Controller;

class Controller{
    
    protected $msg;
    protected $table;
    public $view;
    public $userSession;
    protected $arrayPost;
    protected $arrayGet;
    protected $racineSite = '/lokisalle/';
    protected $racineServer;
    protected $files;
    
    public function __construct(){
        $this->userSession = new \Component\UserSessionHandler;
        $this->cart =  \Component\PanierSessionHandler::getPanier();
        $view = $this->getView();
        $this->view = new $view;
        $this->cookies = \Component\CookieBakery::bakeMeCookies();
        $this->arrayPost = $_POST;
        $this->arrayGet = $_GET;
        $this->racineServer = $_SERVER['DOCUMENT_ROOT'];
        $this->files = $_FILES;
    }
  
/*
 * Charge la vue correspondante automatiquement
 * dans les classes filles
 */
    
    public function getView(){
        $myview = explode('\\', get_called_class());
        $view = str_replace('Controller','Views',$myview[2]);
        $view = 'Backoffice\Views\\'.$view;
        return $view;
    }
    
    public function getRepository($table){
//va servir à instancier ClassxxRepository
		$class = 'Repository\\'.$table.'Repository';
		if(!isset($this->table)){
			$this->table = new $class;
		}
		return $this->table;
	}
        
    public function isPostSet(){
       if(isset($this->arrayPost)){
           return true;
       }
       else{
           return false;
       }
    }
    


/*
 * Nettoie les input de type $_POST
 * marche aussi dans le cas ou un array est 
 * push dans une valeur de $_POST
 */
    public function clean(&$args){
        foreach($args as &$data){
            if(!is_array($data)){
                  $data = \htmlentities($data, ENT_QUOTES);
            }
            else{
//on rapelle la fonction tant que tout l'array n'y est pas passé
                clean($data);
            }
        }
    }
    
/*
 * Check for empty fields
 * @params array($dataInput) tous les $_POST
 * @return string $this->msg
 * 
 */
    
    public function checkForEmptyFields($args = array()){
        $errors = array();
        foreach($args as $key=>$value){
            if($key !== 'etat'){
                $newValue  = trim($value);
            }
            if(empty($newValue)){
                $errors[] = "<div class='error'>Le champ ".$key." est obligatoire</div>";
                //echo $this->msg;
                
            }    
        }
        if(isset($args['mdp2']) && $args['mdp'] != $args['mdp2']){
                    $errors[] = 'Les mots de passe ne correspondent pas!';
                }
        return $errors;
    }
    
    public function checkDoubleEntry($table, $data = array()){
        $queryTable = $this->getRepository($table);
        $test = $queryTable->checkForDoubles($data);
        return $test;
    }

    
    public function userIsConnected(){
        if(empty($_SESSION['user'])){
            return false;
        }
        else{
            return true;
        }
    }
    
/*
 * Fonctions upload fichiers image
 * @params $file
 * @return bool
 */
    
    public function checkFileExt($file){
        $extension = explode('.', $file);
        $whiteList = array('gif', 'png', 'jpg', 'jpeg');
        $authorized = in_array(strtolower($extension[1]), $whiteList);
        return $authorized;
    }
    
    public function randomPwd($length =10){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
       }
    return $randomString;
    }
    
    public function mailLostPwd($destinataire, $newpwd){
        $to = $destinataire;
        $pwd = $newpwd;
        $subject = 'Mot de passe oublié';
        $message = '<html>
        <head>
        <title>Nouveau mot de passe</title>
        </head>
        <body>
        <p>Vous avez récemment demandé un changement de mot de passe sur notre site LokiSalle</p>
        <p>Voici votre nouveau mot de passe : '.$pwd.'</p>
        <p>Si vous souhaitez modifier votre mot de passe, il vous est possible de le faire dans la rubrique "Mon compte" de votre espace client.</p>
        </body>
        </html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'From: "Lokisalle" <loki-salle@alwaysdata.net>' . "\r\n";
     

    $mail = mail($to, $subject, $message, $headers); //marche

    if($mail){
        return true;
    }
    else{
        return false;
        }
    }
    
    public function welcomeNewAdmin($destinataire,$pseudo, $newpwd){
        $to = $destinataire;
        $pwd = $newpwd;
        $subject = 'Vous avez été ajouté en tant qu\'administrateur du site Lokisalle';
        $message = '<html>
        <head>
        <title>'.$subject.'</title>
        </head>
        <body>
        <p>Vous avez été invité à rejoindre l\'equipe de Lokisalle</p>
        <p>Voici vos indentifiants temporaires :</p>
        <p>Email : '.$to.'</p>
        <p>Pseudo : '.$pseudo.'</p>
        <p>Mot de passe : '.$pwd.'</p>
        <p>Il vous est FORTEMENT conseillé de changer de mot de passe dans les plus bref délais, en rendant dans la rubrique "Mon compte" de votre espace administrateur.</p>
        </body>
        </html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'From: "Lokisalle" <loki-salle@alwaysdata.net>' . "\r\n";

     

    $mail = mail($to, $subject, $message, $headers); //marche

    if($mail){
        return true;
    }
    else{
        return false;
        }
    }
    
    
    public function compareTwoDates($date1, $date2){
        $arrivee = strtotime($date1);
        $depart = strtotime($date2);
        $today = strtotime('today');
        if($depart < $arrivee){
            $this->msg[] ="La date de départ ne peut pas être inférieure à la date d'arrivée!";
        }
        if($arrivee <= $today){
            $this->msg[] = "<br/>La date d'arrivée ne peut pas être inférieure à la date d'ajourd'hui!";
        }
        return $this->msg;
    }
    
}


