<?php
namespace Repository;
USE Manager\EntityRepository;

class CommandeRepository extends EntityRepository{
    
    public function addOrder(&$args){
        var_dump($args);
        $query = $this->getDb()->prepare("INSERT INTO commande (montant, id_membre,date) VALUES (:montant, :id_membre, CURDATE())");
        $this->binder($query,$args);
        $result = $query->execute();
    }
}
