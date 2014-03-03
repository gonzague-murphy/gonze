<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class AvisRepository extends EntityRepository{
    
    public function findBySalleId($id){
        $query = $this->getDb()->prepare("SELECT a.*, m.pseudo FROM avis a, membre m WHERE a.id_membre=m.id_membre AND a.id_salle=$id");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    
    
}

