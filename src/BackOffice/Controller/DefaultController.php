<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DefaultController extends Controller{
    
   
    public function indexDisplay(){
        $cont = new ProduitController;
        $salle = $cont->displayMostRecent();
        $this->view->indexDisplay($salle);
    }
    
/*
 * Fonction no result
 */
    
/*
 * Error 404
 */

/*
 * Error 503
 */
    
}


