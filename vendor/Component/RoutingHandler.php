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
         if(class_exists($controller)){
         //echo $controller::$counter;
               $cont = new $controller; // elle existe, on l'inclue
               $this->accessControl($action);
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

    public function accessControl($action){
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
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

