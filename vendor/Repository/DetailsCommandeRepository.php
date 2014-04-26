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
    
/*
 * Stats query 3e query
 */
    public function topFiveQty(){
        $query = $this->getDb()->prepare("SELECT COUNT(d.id_details_commande) AS compte, m.pseudo, c.id_membre FROM details_commande d INNER JOIN commande c ON c.id_commande=d.id_commande INNER JOIN membre m ON c.id_membre=m.id_membre GROUP BY m.pseudo ORDER BY compte DESC LIMIT 0,5;");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $result = $query->fetchAll();
    }
}
