<?php
namespace Component;

class UserSessionHandler{
    
    public static $user;
    
    public function __construct(){
        $this->castUser();
    }
    
    public function castUser(){
        if(isset($_SESSION['user'])){
            self::$user = new \Entity\Membre;
            foreach($_SESSION['user'] as $key=>$value){
                self::$user->$key = $value;
            }
            return self::$user;
        }
    }
    
    public static function getUser(){
        return self::$user;
    }
    
//Session et panier
    
     public function initializeSession($user){
             $array = get_object_vars($user);
             foreach($array as $key=>$value){
                 $_SESSION['user'][$key] = $value;
             }
             
             PanierSessionHandler::initializeCart(); 
      }
}

