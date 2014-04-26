<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DefaultController extends Controller{
    
    public function __construct(){
        $this->avis = new AvisController;
        $this->membre = new MembreController;
        $this->commande = new CommandeController;
        $this->salle = new SalleController;
        $this->view = new \Backoffice\Views\DefaultViews;
    }
    
   
    public function indexDisplay(){
        $cont = new ProduitController;
        $salle = $cont->displayMostRecent();
        $this->view->indexDisplay($salle);
    }
    
    public function assembleStats(){
        $bestRanked = $this->avis->topVenuesAvg();
        $mostSold = $this->salle->listMostSoldAdmin();
        $this->view->displayStatsAdmin($bestRanked, $mostSold);
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


