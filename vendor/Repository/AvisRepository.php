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
    
    public function checkDouble($user, $salle){
            $query = $this->getDb()->prepare("SELECT * FROM avis WHERE id_membre='$user' AND id_salle='$salle'");
            $query->execute();
            $result = $query->rowCount();
            return $result;
    }
    
    public function addFeedback($data){
        $query = $this->getDb()->prepare("INSERT INTO avis (commentaire, note, date, id_salle, id_membre) VALUES(:commentaire, :note, CURDATE(), :id_salle, :id_membre)");
        $this->objectBinder($query, $data);
        $query->execute();
    }
    
    
    public function objectBinder($query, $avis=array()){
            $cles = array('submit');
            foreach($avis as $key=>$value){
                if(!in_array($key, $cles)){
                    $query->bindValue(":$key",$value);
                }
            }   
        }

}

