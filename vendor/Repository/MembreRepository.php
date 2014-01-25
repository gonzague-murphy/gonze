<?php
namespace Repository;
USE Manager\EntityRepository;
USE PDO;


class MembreRepository extends EntityRepository{

        
        

        public function getAllMembers(){
            return $this->findAll();
        }
/*
 * Fonction d'inscription 
 */

        public function signUpQuery(&$userData){
            $myArray = array_slice($userData, 0,2);
            $query = $this->getDb()->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse)VALUES (:pseudo,:mdp,:nom,:prenom,:email,:sex,:ville,:cp,:adresse)");
            $this->binder($query,$userData);
            $query->execute();
            return $myArray;
            }
        
/*
 * La fonction query nécessaire pour un login (pseudo/mdp)
 * Les inputs sont nettoyés dans le Controleur clean()
 * et arrivent propres chez le model
 */

     public function loginQuery($userData = array()){
        //var_dump($userData);
        $query = $this->getDb()->prepare("SELECT id_membre, pseudo, nom, prenom, email, ville, cp, adresse, statut FROM ".$this->getTableName()." WHERE pseudo=:pseudo AND mdp=:mdp");
        $this->binder($query,$userData);
        $query->setFetchMode(PDO::FETCH_CLASS, 'Entity\\'.'Membre');
        $query->execute();
        $myObject= $query->fetch();
//Si la query ne passe pas, on fait une erreur propre
        if($query == false){
           return false;
        }
//Sinon on attribue true à la variable témoin
        else{           
            return $myObject;
        }
    }
    
}

