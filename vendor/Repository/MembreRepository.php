<?php
namespace Repository;
USE Manager\EntityRepository;
USE Manager\PDOManager;
USE Entity\Membre;

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



}

