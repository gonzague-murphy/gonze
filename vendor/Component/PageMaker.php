<?php
namespace Component;

class PageMaker{
    
    public $page;
    
    public function __construct(){
        $this->page = $_GET['page'];
    }
    
    public static function totalNumberOfPages($queryResult){
        if($queryResult%10){
            $number = $queryResult/10;
            return $number;
        }
        
        else{
            $number = ($queryResult/10)+1;
            return $number;
        }
    }
    
}
