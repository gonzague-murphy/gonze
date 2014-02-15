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
            if($controller::$counter>0){
                $controller->$action();
            }
            else{
               $cont = new $controller; // elle existe, on l'inclue
               $cont->$action();  
            }
       }
       else{
           echo "404";
       }
       
    }
}
dispatcher();
//echo Backoffice\Controller\MembreController::getUser();