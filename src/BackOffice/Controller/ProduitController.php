<?php
namespace Backoffice\Controller;
USE Controller\Controller;


class ProduitController extends Controller{
    public $salleController;
    public $promoController;
    
    public function listeAllSalle(){
        $salleController = new SalleController;
        $all = $salleController->listeAllForProducts();
        foreach($all as $objects){
            return $objects;
        }
    }
    
    
}