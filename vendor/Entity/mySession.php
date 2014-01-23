<?php
namespace Entity;
class mySession{
    protected static $instance = null;
//Quand un constructeur est privé, on ne peut pas instancier la classe :
    private function __construct(){}
    private function __clone(){}
    public static function getSession(){
		if(is_null(self::$instance)){
		
			self::$instance = new self;
		}
		return self::$instance;
	}
}

