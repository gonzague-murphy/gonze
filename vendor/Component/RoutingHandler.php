<?php
namespace Component;
class RoutingHandler{
    
    public $getParams;
    
    public function __construct(){
        $this->getParams = $_GET;
        $this->dispatcher();
    }
    
    public function dispatcher(){
    if(empty($this->getParams)){
        $this->getParams['controller'] = 'DefaultController';
        $this->getParams['action'] = 'indexDisplay';
    }
    
    if(!isset($controller) && !isset($action)){
         $controller = $this->getParams['controller'];
         $action = $this->getParams['action'];
    }
    
     if(!empty($controller) && !empty($action)){
         $controller = "Backoffice\Controller\\".$controller;
         if(\class_exists($controller)){
               $cont = new $controller;
               if(\method_exists($cont, $action)){
                $this->accessControl($action);
                $cont->$action();
               }
               else{
                   $default = new \Backoffice\Controller\DefaultController();
                   $default->unknownPage();
               }
            }
            else{
                 echo "404";
            }
       }
       else{
           echo "404";
       }
   
    }
    
/*
 * La convention de nommage (+le camelCase)fait que chaque
 * methode qui gère des fonctions d'admin
 * comporte 'Admin' dans son nom
 */

    public function accessControl($action){
        $exploded = preg_split('/(?=[A-Z])/',$action);
        foreach($exploded as $key=>$value){
            $membre = strtolower($value);
            if($membre == 'admin'){
                $user = \Component\UserSessionHandler::getUser();
                if(!isset($user) || $user->statut !=1){
                    echo 'You should\'nt be here';
                    exit();
                }
            }
        }
    }
}


