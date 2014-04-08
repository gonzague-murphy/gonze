<?php
namespace Backoffice\Controller;
USE Controller\Controller;
require_once(__DIR__."/../Views/template/menu.php");

class DefaultController extends Controller{
    
   
    public function indexDisplay(){
        $cont = new ProduitController;
        $salle = $cont->displayMostRecent();
        $this->view->indexDisplay($salle);
    }
    
    public function makeMenu(){
        makeMenu();
        makeUserMenu();
    }
    
}


