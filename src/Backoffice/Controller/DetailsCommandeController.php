<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DetailsCommandeController extends Controller{
    
    public function insertDetails($id_commande, $id_produit){
        $this->getRepository('DetailsCommande')->addDetails($id_commande, $id_produit);
    }
}

