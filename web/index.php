<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();

function dispatcher(){
    if(empty($_GET)){
        $_GET['controller'] = 'MembreController';
        $_GET['action'] = 'defaultDisplay';

    }
    if(!isset($controller) && !isset($action)){
         $controller = $_GET['controller'];
         $action = $_GET['action'];
         
        
    }
     if(!empty($controller) && !empty($action)){
         $controller = "Backoffice\Controller\\".$controller;
	 $cont = new $controller; // elle existe, on l'inclue
         //var_dump($cont);
         $cont->$action();
               
    }
    
    /*if(!empty($controller) && !empty($action) && isset($_POST)){
        $controller = "Backoffice\Controller\\".$controller;
	 $cont = new $controller; // elle existe, on l'inclue
         //var_dump($cont);
         $cont->$action($_POST);
    }*/
    
}
dispatcher();
/*if(isset($_POST['submit'])){
    $membre = new Backoffice\Controller\MembreController;
    $membre->signUp($_POST);
}*/