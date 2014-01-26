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
            $query = $this->getDb()->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse)VALUES (:pseudo,:mdp,:nom,:prenom,:email,:sex,:ville,:cp,:adresse)");
            $this->binder($query,$userData);
            $result = $query->execute();
            return $result;
            }
        
/*
 * La fonction query nécessaire pour un login (pseudo/mdp)
 * Les inputs sont nettoyés dans le Controleur clean()
 * et arrivent propres chez le model
 */

     public function loginQuery($userData = array()){
        $myArray = array_slice($userData,0,2);
        //var_dump($myArray);
        $query = $this->getDb()->prepare("SELECT id_membre, pseudo, nom, prenom, email, ville, cp, adresse, statut FROM ".$this->getTableName()." WHERE pseudo=:pseudo AND mdp=:mdp");
        $this->binder($query,$myArray);
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
    
        public function checkForDoubles($userData = array()){
            $pseudo = $this->findByKey('pseudo', $userData);
            $mail = $this->findByKey('email', $userData);
            $query = $this->getDb()->prepare("SELECT * FROM ".$this->getTableName()." WHERE email='$mail' OR pseudo='$pseudo'");
            $query->execute();
            $result = $query->rowCount();
            if(!$query){
                return false;
            }
            else{
                return $result;
            } 
        }
    
}

