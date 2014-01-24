<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;


class MembreRepository extends EntityRepository{

        
        

        public function getAllMembers(){
            return $this->findAll();
        }
/*
 * Il va falloir hardcoder tout ça
 * edit*:il va quand meme falloir hardcoder T.T
 */

        public function signUpquery($userData=array()){
            $query = $this->getDb()->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom)VALUES ('$userData[pseudo]','$userData[mdp]','$userData[nom]','$userData[prenom]')");
            $query->execute();
         }
        
/*
 * La fonction query nécessaire pour un login (pseudo/mdp)
 * Les inputs sont nettoyés dans le Controleur clean()
 * et arrivent propres chez le model
 */

     public function loginQuery($arg1,$arg2){
        $query = $this->getDb()->prepare("SELECT id_membre, pseudo, nom, prenom, email, ville, cp, adresse, statut FROM ".$this->getTableName()." WHERE pseudo='".$arg1."' AND mdp='".$arg2."'");
        //$query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Membre');
        $query->execute();
        $myObject= $query->fetch();
       
/*
 * Si la query ne passe pas, on fait une erreur propre
 */
        if(!$query){
           return false;
        }
/*
 * Sinon on attribue true à la variable témoin
 */
        else{           
            return $myObject;
        }
    }

}

