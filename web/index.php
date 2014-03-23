<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();

function dispatcher(){
    if(empty($_GET)){
        $_GET['controller'] = 'DefaultController';
        $_GET['action'] = 'indexDisplay';
    }
    
    if(!isset($controller) && !isset($action)){
         $controller = $_GET['controller'];
         $action = $_GET['action'];
    }
    
     if(!empty($controller) && !empty($action)){
         $controller = "Backoffice\Controller\\".$controller;
         if(class_exists($controller)){
         //echo $controller::$counter;
               $cont = new $controller; // elle existe, on l'inclue
               accessControl($action);
               $cont->$action();
            }
            else{
                 echo "404";
            }
       }
       else{
           echo "404";
       }
   
}

function accessControl($action){
    $exploded = preg_split('/(?=[A-Z])/',$action);
    foreach($exploded as $key=>$value){
        $membre = strtolower($value);
        if($membre == 'admin'){
            $user = \Component\UserSessionHandler::getUser();
            if(!isset($user) || $user->id_membre !=1){
                echo 'You should\'nt be here';
                exit();
            }
        }
    }
}
dispatcher();
//Component\PanierSessionHandler::initializeCart(); 
