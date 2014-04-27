<?php
namespace Component;

class CookieBakery{
    
    public static function bakeMeCookies(){
        return $_COOKIE;
    }
    
    public static function rememberMe($data){
        $year = time() + 31536000;
        setcookie('rememberMe', $data['pseudo'], $year);  
   }
   
   public static function forgetAboutMe(){
       $past = time() - 100;
       setcookie('rememberMe', 'gone', $past);
   }
   
   public static function atLogin($data){
       if(isset($data['remember'])){
           self::rememberMe($data);
       }
       
       elseif(!isset($data['remember'])) {
	if(isset($_COOKIE['rememberMe'])) {
		self::forgetAboutMe();
	}
      }
   }
}

