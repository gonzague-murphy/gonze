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
    
    public function insertSubscriber($id){
        $query = $this->getDb()->prepare("INSERT INTO newsletter (id_membre) VALUES ($id);");
        $query->execute();
    }
    
    public function checkDouble($id){
        $query = $this->getDb()->prepare("SELECT * FROM newsletter WHERE id_membre=$id");
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }
}

