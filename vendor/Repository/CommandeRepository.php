<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class CommandeRepository extends EntityRepository{
    
    public function addOrder(&$args){
        //var_dump($args);
        $query = $this->getDb()->prepare("INSERT INTO commande (montant, id_membre,date) VALUES (:montant, :id_membre, NOW())");
        $this->binder($query,$args);
        $query->execute();
        return $this->getDb()->lastInsertId();
    }
    
    public function mostExpensive(){
        $query = $this->getDb()->prepare("SELECT SUM(c.montant) AS compte, m.pseudo FROM commande c INNER JOIN membre m ON c.id_membre=m.id_membre GROUP BY m.pseudo ORDER BY compte DESC LIMIT 0,5;");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $result = $query->fetchAll();
    }
    
}
