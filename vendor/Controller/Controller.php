<?php

namespace Controller;

class Controller{
    
    protected $msg;
    protected $table;
    public $view;
    public $userSession;
    protected $arrayPost;
    protected $arrayGet;
    protected $racineSite = '/lokisalle/';
    protected $racineServer;
    protected $files;
    
    public function __construct(){
        $this->userSession = new \Component\UserSessionHandler;
        $view = $this->getView();
        $this->view = new $view;
        $this->arrayPost = $_POST;
        $this->arrayGet = $_GET;
        $this->racineServer = $_SERVER['DOCUMENT_ROOT'];
        $this->files = $_FILES;
    }
  
/*
 * Charge la vue correspondante automatiquement
 * dans les classes filles
 */
    
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
       if(isset($this->arrayPost)){
           return true;
       }
       else{
           return false;
       }
    }
    
    public function formValidation($fonction1, $data=array()){
        $this->clean($data);
        $this->msg = $this->checkForEmptyFields($data);
        if(empty($this->msg)){
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
                  $data = \htmlentities($data, ENT_QUOTES);
            }
            else{
//on rapelle la fonction tant que tout l'array n'y est pas passé
                clean($data);
            }
        }
    }
    
/*
 * Check for empty fields
 * @params array($dataInput) tous les $_POST
 * @return string $this->msg
 * 
 */
    
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

    
    public function userIsConnected(){
        if(empty($_SESSION['user'])){
            return false;
        }
        else{
            return true;
        }
    }
    
/*
 * Fonctions upload fichiers image
 * @params $file
 * @return bool
 */
    
    public function checkFileExt($file){
        $extension = explode('.', $file);
        $whiteList = array('gif', 'png', 'jpg', 'jpeg');
        $authorized = in_array(strtolower($extension[1]), $whiteList);
        return $authorized;
    }
    
    
}


