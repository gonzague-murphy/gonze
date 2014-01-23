<?php 

namespace Manager;
class PDOManager{
//On s'assure qu'il n'y ait pas 2 connexions à la DB
	protected static $instance = null;
	protected $pdo;
//Quand un constructeur est privé, on ne peut pas instancier la classe :
	private function __construct(){}
	private function __clone(){}
//Mise en place d'un pattern Singleton	
	public static function getInstance(){
		if(is_null(self::$instance)){
		
			self::$instance = new self;
		}
		return self::$instance;
	}
	public function getPdo(){
		require_once __DIR__ .'/../../app/Config.php';
//backslash pour sortir du namespace Manager
		$config = new \Config;
		$connect = $config->getParametersConnect();
//On fait un try catch pour gérer les messages d'erreur de connexion à la base
		try{
			$this->pdo = new \PDO('mysql:dbname='.$connect['db'].';host='.$connect['host'],$connect['user'],$connect['password'], array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION));
		}
		catch(\PDOException $e){
			echo 'Mauvaise connexion à la BDD'.$e->getMessage();
		}
		return $this->pdo;
	}

}
//-----------------------------------------------------------
$pdo = PDOManager::getInstance()->getPDO();  
//var_dump($pdo);

?>