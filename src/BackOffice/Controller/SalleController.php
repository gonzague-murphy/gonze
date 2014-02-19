<?php

namespace Backoffice\Controller;
USE Controller\Controller;


class SalleController extends Controller{
    

/*
 * Insert
 */    
    public function addSalle(){
        if(isset($_POST)){
            $queryTable = $this->getRepository('Salle');
            $queryTable->addSalle($_POST);
            $this->listeAllAdmin();
        }
    }
    
    
    
/*
 * Update
 * 
 */
   public function modifySalle(){
       //var_dump($_GET);
       if(isset($_POST)){
       $queryTable = $this->getRepository('Salle');
       $queryTable->updateSalle($_POST, $_GET['id']);
       $this->displayForAdmin();
       }
   }
   
/*
 * Delete
 */
   
   public function deleteSalle(){
       if(isset($_GET['id'])){
           $queryTable = $this->getRepository('Salle');
           $queryTable->deleteSalle($_GET['id']);
           $this->displayForAdmin();
           
       }
   }
/*
 * Query pour affichage mixte
 * 
 */
   
   public function listeAllForProducts(){
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
         if($salles == false){
            echo $this->msg = "<div class='error'>Désolé, aucune salle enregistrée pour l'instant</div>";
        }
        else{
            return $salles;
         }
    
    }
    
        public function findAllById(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            
                }
            else{
                return $salles;
            }
        }
    }
    
    
/*
 * Fonctions de display
 * 
 */
    
    public function displayForAdmin(){
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
         if($salles == false){
            echo $this->msg = "<div class='error'>Désolé, aucune salle enregistrée pour l'instant</div>";
        }
        else{
            $this->view->displayForAdmin($salles);
         }
    }
    
    public function displaySalleForm(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            }
            else{
                $this->view->updateSalleForm($salles);
            }
        }
        else{
            $this->displayForAdmin();
        }
    }
/*
 * Insert display
 */
    
    public function displaySalleFormAdd(){
        $this->view->addSalleForm();
    }
    


}