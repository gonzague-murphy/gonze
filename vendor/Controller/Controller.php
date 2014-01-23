<?php

namespace Controller;



class Controller{
    
    protected $table;
    /*public function getRepository(){
        $ex = explode('\\',get_called_class());
        $class = str_replace('Controller','',$ex[2]);
        if(!isset($this->table)){
            $this->table = new $class;
        }
        return $this->table;
    }*/
    
    public function getRepository($table){
//va servir à instancier ClassxxRepository
		$class = 'Repository\\'.$table.'Repository';
		if(!isset($this->table)){
			$this->table = new $class;
		}
		return $this->table;
	}
    
    public function render($layout, $template, $parameters = array()){
//Prend en compte le fait que la classe fille va utiliser la fonction dans Backoffice\Controller\ClassxxController
        $dirViews = __DIR__.'/../../src/'.str_replace('\\','/', get_called_class().'/../../Views');
        $ex = explode('\\',get_called_class());
        $dirFile = str_replace('Controller', '', $ex[2]);
        $template = $dirViews.'/'.$dirFile.'/'.$template;
        $layout = $dirViews.'/'.$layout;
        
        extract($parameters);
        
        ob_start();
            require $template;
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
                  $data = preg_replace('/[^a-zA-Z0-9\s]/','', $data);
            }
            else{
//on rapelle la fonction tant que tout l'array n'y est pas passé
                clean($data);
            }
        }
    }
    
    
    
}


