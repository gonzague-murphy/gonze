<?php

namespace Controller;


class Controller{
    
    protected $msg;
    protected $table;
    public $view;
    public $userSession;
    
    public function __construct(){
        $this->userSession = new \Component\UserSessionHandler;
        $view = $this->getView();
        $this->view = new $view;
    }
    
    
    public function getView(){
        $myview = explode('\\', get_called_class());
        $view = str_replace('Controller','Views',$myview[2]);
        $view = 'Backoffice\Views\\'.$view;
        return $view;
    }
    
    public function getRepository($table){
//va servir à instancier ClassxxRepository
		$class = 'Repository\\'.$table.'Repository';
		if(!isset($this->table)){
			$this->table = new $class;
		}
		return $this->table;
	}
        
    public function isPostSet(){
       if(isset($_POST)){
           return true;
       }
       else{
           return false;
       }
    }
    
    public function formValidation($fonction1, $data=array()){
        $this->msg = $this->checkForEmptyFields($data);
        if(empty($this->msg)){
            $this->clean($data);
            $table = explode('\\', get_called_class());
            $requestTable = str_replace('Controller','',$table[2]);
            $queryTable = $this->getRepository($requestTable);
            $result = $queryTable->$fonction1($data);
            return $result;
        }
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


