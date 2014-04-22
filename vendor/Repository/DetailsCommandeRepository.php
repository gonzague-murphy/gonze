<?php
namespace Repository;
USE PDO;
USE Manager\EntityRepository;

class DetailsCommandeRepository extends EntityRepository{
    
    public function addDetails($id_commande, $id_produit){
        $query = $this->getDb()->prepare("INSERT INTO details_commande (id_commande, id_produit) VALUES ($id_commande, $id_produit)");
        $query->execute();
    }
    
    public function findById($id){
        $query = $this->getDb()->prepare("SELECT * FROM details_commande WHERE id_commande=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'DetailsCommande');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
