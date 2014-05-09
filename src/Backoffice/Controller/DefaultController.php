<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DefaultController extends Controller{
    
    public function __construct(){
        $this->avis = new AvisController;
        $this->membre = new MembreController;
        $this->commande = new CommandeController;
        $this->salle = new SalleController;
        $this->detail = new DetailsCommandeController;
        $this->view = new \Backoffice\Views\DefaultViews;
    }
    
   
    public function indexDisplay($msg=''){
        $cont = new ProduitController;
        $salle = $cont->displayMostRecent();
        $this->view->indexDisplay($salle, $msg);
    }
    
    public function assembleStatsAdmin(){
        $bestRanked = $this->avis->topVenuesAvg();
        $mostSold = $this->salle->listMostSoldAdmin();
        $mostQty = $this->detail->topProductQty();
        $mostExp = $this->commande->mostExpensive();
        $this->view->displayStatsAdmin($bestRanked, $mostSold, $mostQty, $mostExp);
    }
    
    public function mentionLegales(){
        $this->view->displayMentionsLegales();
    }
    
    public function displayCgv(){
        $this->view->displayCgv();
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


