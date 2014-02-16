<?php

namespace Controller;

class Controller{
    
    protected $msg;
    protected $table;
    
    
    public function getRepository($table){
//va servir à instancier ClassxxRepository
		$class = 'Repository\\'.$table.'Repository';
		if(!isset($this->table)){
			$this->table = new $class;
		}
		return $this->table;
	}
    
    public function render($layout, $template, $parameters = array()){
        //var_dump(\Component\SessionHandler::$user);
//Prend en compte le fait que la classe fille va utiliser la fonction dans Backoffice\Controller\ClassxxController
        $dirViews = __DIR__.'/../../src/'.str_replace('\\','/', get_called_class().'/../../Views');
        $ex = explode('\\',get_called_class());
        //var_dump($ex);
        $dirFile = str_replace('Controller', '', $ex[2]);
        $template = $dirViews.'/'.$dirFile.'/'.$template;
        $layout = $dirViews.'/'.$layout;
        $menu = $dirViews.'/'.'menu.php';
        //var_dump($_SESSION);
        extract($parameters);
        
        ob_start();
            require $template;
            require $menu;
            $content = ob_get_clean();
            require $layout;
        return ob_end_flush();
    }

/*
 * Nettoie les input de type $_POST
 * marche aussi dans le cas ou un array est 
 * push dans une valeur de $_POST
 */
    public function clean(&$args){
        foreach($args as &$data){
            if(!is_array($data)){
                  $data = preg_replace('`^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$`','', $data);
            }
            else{
//on rapelle la fonction tant que tout l'array n'y est pas passé
                clean($data);
            }
        }
    }
    
    public function checkForEmptyFields($args = array()){
        foreach($args as $key=>$value){
            $newValue  = trim($value);
            if(empty($newValue)){
                $this->msg = "<div class='error'>Le champ ".$key." est obligatoire</div>";
                echo $this->msg;
            }
        }
        return $this->msg;
    }
    
    public function checkDoubleEntry($table, $data = array()){
        $queryTable = $this->getRepository($table);
        $test = $queryTable->checkForDoubles($data);
        return $test;
    }
    
/*
 * Check for empty fields
 * @params array($dataInput) tous les $_POST
 * @return string $this->msg
 * 
 */

    
    public function userIsConnected(){
        if(empty($_SESSION['user'])){
            return false;
        }
        else{
            return true;
        }
    }
    
    
    
}


