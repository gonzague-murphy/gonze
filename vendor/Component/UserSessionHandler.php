<?php
namespace Component;
class UserSessionHandler{
    
    public static $user;
    public $panier;
    public static $counter = 0;
    

    public static function getUserSession(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }
    
    
     public function initUser($user){
            self::$user = $user;
            $this->initializeSession();
    }
    
    public static function setUser($user){
        return self::$user = $user;
    }
//Session et panier
    
     public function initializeSession(){
         var_dump(self::$user);
             $array = get_object_vars(self::$user);
             //$this->clean($array);
             foreach($array as $key=>$value){
                 $_SESSION['user'][$key] = $value;
             }
             //var_dump($_SESSION);
         
         $this->initializeCart(); 
      }
      
      public function initializeCart(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
            $_SESSION['panier']['titre'] = array();
            $_SESSION['panier']['id_article'] = array();
            $_SESSION['panier']['quantite'] = array();
            $_SESSION['panier']['prix'] = array();
		}
	return true;
    }
}

