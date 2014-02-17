<?php 
class Autoload{

	public static function className($className){
		$ex = explode('\\', $className);   
                //var_dump($ex);
                
//"si le module qu'on me demande est dans le Backoffice":
                if($ex[0] == 'Backoffice' || $ex[0] == 'BackOffice'){
//"alors remonte dans le repertoire src"
                    $path = __DIR__ . '/../src/'.implode('/', $ex).'.php';
                }
                
                elseif($ex[0] == 'Component'){
                    $path = __DIR__.'/'.implode('/', $ex).'.php';
                }

			
		else{
			$path = __DIR__ . '/' .implode('/', $ex).'.php';
                }
                //var_dump($path);
		require $path;
	}

}
//EN GROS autoload, nous sert à charger toutes nos classes dès que les objets sont créés

//--------------------------------------------

//si jamais tu croises un "new", va dans cette classe là, appeller cette méthode là
spl_autoload_register(array('Autoload', 'className'));
//require_once(__DIR__.'/../vendor/Entity/Membre.php');