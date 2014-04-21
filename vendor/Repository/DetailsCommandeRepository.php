<?php
namespace Repository;
USE Manager\EntityRepository;

class DetailsCommandeRepository extends EntityRepository{
    
    public function addDetails($id_commande, $id_produit){
        $query = $this->getDb()->prepare("INSERT INTO details_commande (id_commande, id_produit) VALUES ($id_commande, $id_produit)");
        $query->execute();
    }
}
