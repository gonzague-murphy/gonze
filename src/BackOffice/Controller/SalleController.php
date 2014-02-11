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
       $this->listeAllAdmin();
       }
   }
   
/*
 * Delete
 */
   
   public function deleteSalle(){
       if(isset($_GET['id'])){
           $queryTable = $this->getRepository('Salle');
           $queryTable->deleteSalle($_GET['id']);
           $this->listeAllAdmin();
           
       }
   }
/*
 * Find by ID
 * 
 */
   
   public function findSalleId($id){
       $queryTable = $this->getRepository('Salle');
       $result = $queryTable->findById($id);
       return $result;
   }
    
/*
 * Fonctions de display
 * 
 */
    
    public function listeAllAdmin(){
        //var_dump(\Backoffice\Controller\MembreController::getUser());
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
        //var_dump($salles);
         if($salles == false){
            echo $this->msg = "<div class='error'>Désolé, aucune salle enregistrée pour l'instant</div>";
        }
        else{
            $this->render('template_accueil.php', 'salle.php', array(
                'title'=>'Bienvenue, Admin',
                'salles'=>$salles
            ));
         }
    }
    
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
    
/*
 * Update display
 */
    
    public function displaySalleForm(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            }
            else{
            $this->render('template_accueil.php', 'salleform.php',array(
            'title'=>'Bienvenue, Admin',
            'salles'=>$salles
        ));
            }
        }
        else{
            $this->render('template_accueil.php', 'salle.php',array(
            'title'=>'Bienvenue, Admin',
        ));
        }
    }
/*
 * Insert display
 */
    
    public function displaySalleFormAdd(){
        $this->render('template_accueil.php', 'salleformadd.php', array(
            'title'=> 'Lokisalle'
        ));
    }
    
    public function findAllById(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            
                }
    
        }
    
    }
    
    public function salleHasProduct(){
        $querytable = $this->getRepository('Salle');
        $liste = $querytable->selectHasProduct();
        return $liste;
    }

}