<?php

namespace Backoffice\Controller;
USE Controller\Controller;


class SalleController extends Controller{
    

/*
 * Insert
 */    
    public function addSalle(){
        if(isset($this->arrayPost)){
            $queryTable = $this->getRepository('Salle');
            $result = $queryTable->addSalle($this->arrayPost);
            $total = $queryTable->findAll();
            $this->view->displayForAdmin($total);
        }
    }
    
    
    
/*
 * Update
 * 
 */
   public function modifySalle(){
       if(isset($this->arrayPost)){
       $queryTable = $this->getRepository('Salle');
       $queryTable->updateSalle($this->arrayPost, $this->arrayGet['id']);
       $this->displayForAdmin();
       }
   }
   
/*
 * Delete
 */
   
   public function deleteSalle(){
       if(isset($this->arrayGet['id'])){
           $queryTable = $this->getRepository('Salle');
           $queryTable->deleteSalle($this->arrayGet['id']);
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
        if(isset($this->arrayGet['id'])){
            $id = htmlentities($this->arrayGet['id'], ENT_QUOTES);
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
        if(isset($this->arrayGet['id'])){
            $id = htmlentities($this->arrayGet['id'], ENT_QUOTES);
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