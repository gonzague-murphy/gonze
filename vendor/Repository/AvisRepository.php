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
    
    public function fetchAll(){
        $query = $this->getDb()->prepare("SELECT a.*, m.pseudo, s.titre FROM avis a, membre m, salle s WHERE a.id_membre=m.id_membre AND a.id_salle=s.id_salle");
        $query->setFetchMode(PDO::FETCH_CLASS, '\Entity\\'.'Avis');
        $query->execute();
        return $result = $query->fetchAll();
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
    
    public function deleteFeedback($id){
        $query = $this->getDb()->prepare("DELETE FROM avis WHERE id_avis=$id");
        $query->execute();
    }
    
/*
 * Query Statistiques salles les mieux notées
Pour avoir le max :

SELECT a.id_salle, a.note FROM avis a JOIN(SELECT MAX(note) AS noteMax, id_salle FROM avis  GROUP BY id_salle)AS b ON a.id_salle=b.id_salle AND a.note=b.noteMax ORDER BY b.noteMax DESC LIMIT 0,5;

Pour avoir la moyenne :

SELECT s.titre, AVG(a.note) FROM salle s, avis a WHERE a.id_salle=s.id_salle GROUP BY a.id_salle;*/

    
    public function bestRanked(){
        $query = $this->getDb()->prepare("SELECT s.titre, a.id_salle, ROUND(AVG(a.note),0) as note, COUNT(a.id_avis) as nbre FROM salle s, avis a WHERE a.id_salle=s.id_salle GROUP BY a.id_salle");
        $query->setFetchMode(PDO::FETCH_CLASS, '\Entity\\'.'Avis');
        $query->execute();
        return $result = $query->fetchAll();
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

