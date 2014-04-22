<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DetailsCommandeController extends Controller{
    
    public function insertDetails($id_commande, $id_produit){
        $this->getRepository('DetailsCommande')->addDetails($id_commande, $id_produit);
    }
    
    public function findAll(){
        $result = $this->getRepository('DetailsCommande')->findAll();
        return $result;
    }
    
    public function findById($id){
        $result = $this->getRepository('DetailsCommande')->findById($id);
        return $result;
        
    }
}

