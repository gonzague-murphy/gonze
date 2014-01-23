<?php 

	class Config{
	
		protected $parameter;
		public function __construct(){
		
			global $parameters;
// __DIR__ constante magique permet de retrouver le chemin du dossier ou on est 
			require_once __DIR__ .'/config/parameters.php';
			
//on recup l'array developpé dans parameters.php, on sépare les fichiers au cas ou on devrait changer le nom de la base sans lire de code
			$this->parameter = $parameters;
		}
		
		public function getParametersConnect(){
			return $this->parameter['connect'];
		}
	
	}
	
/*$conf = new Config;
echo "<pre>";print_r($conf->getParametersConnect());echo "</pre>";*/
?>