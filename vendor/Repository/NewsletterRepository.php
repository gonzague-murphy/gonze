<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;

class NewsletterRepository extends EntityRepository{
    
    public function selectSubscriberEmail(){
        $query = $this->getDb()->prepare("SELECT email FROM membre m, newsletter n WHERE n.id_membre=m.id_membre");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Newsletter');
        $query->execute();
        return $result = $query->fetchAll();
    }
}

