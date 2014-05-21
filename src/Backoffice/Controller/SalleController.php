<?php
namespace Backoffice\Controller;
USE Controller\Controller;


class SalleController extends Controller{
    
/*
 * Insert
 */    
    public function addSalle(){
        if(isset($this->arrayPost)){
            $this->clean($this->arrayPost);
            $this->msg = $this->checkForEmptyFields($this->arrayPost);
            if(empty($this->files['photo']['name'])){
                $this->msg[] = "Le champ Photo est obligatoire";
            }          
            $errors = array_filter($this->msg);
            if(empty($errors)){
                $proto = $this->makeObjectSalle();
                $salle = $this->sanitizePhoto($proto);
                $queryTable = $this->getRepository('Salle');
                $queryTable->addSalle($salle);
                $total = $queryTable->findAll();
                header('Location: ?controller=SalleController&action=displayForAdmin');
                exit;
            }
            else{
                $this->view->addSalleForm($errors);
            }
        }
    }
    
/*
 * Update
 * 
 */
   public function modifySalle(){
       if(isset($this->arrayPost)){
           $this->clean($this->arrayPost);
           $this->msg = $this->checkForEmptyFields($this->arrayPost);
           if(empty($this->msg)){
                $proto = $this->makeObjectSalle();
                $salle = $this->sanitizePhoto($proto);
                $queryTable = $this->getRepository('Salle');
                $queryTable->updateSalle($this->arrayGet['id'], $salle);
                header('Location: ?controller=SalleController&action=displayForAdmin');
                exit;
           }
           
           else{
               $result = $this->getRepository('Salle')->findById($this->arrayGet['id']);
               $this->view->updateSalleForm($result, $this->msg);
           }
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
 * Renvoie chemin photo/traitement des extensions
 */
   
   public function sanitizePhoto(\Entity\Salle $salle){
       if(($this->files['photo']['name']) !== ''){
            if($this->checkFileExt($this->files['photo']['name']) == 1){
               $nomPhoto = $this->racineSite.'src/Backoffice/Views/img/'.$this->files['photo']['name'];
               $salle->setPhoto($nomPhoto);
               $this->uploadPhoto($salle);
               return $salle;
           }
           else{
               $this->msg = 'Mauvaise extension de fichier';
               return $this->msg;
           }
           echo $this->msg;
        }
        
       else{
           $salle->setPhoto($salle->photoActuelle);
           unset($salle->photoActuelle);
           return $salle;
       }
   }
   
/*
 * Upload photo sur le serveur
 */
   public function uploadPhoto(\Entity\Salle $salle){
       $dirPhoto = $this->racineServer.$salle->getPhoto();
       copy($this->files['photo']['tmp_name'], $dirPhoto);
   }
   
/*
 * Preparation de l'objet salle
 */   
   
   public function makeObjectSalle(){
       $salle = new \Entity\Salle;
       $this->clean($this->arrayPost);
       foreach($this->arrayPost as $key=>$value){
           $salle->$key = $value;
       }
       return $salle;
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
            $salles = $this->getRepository('Salle')->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            }
            else{
                return $salles;
            }
        }
    }
    
    public function findById($id){
        $salles = $this->getRepository('Salle')->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            }
            else{
                return $salles;
            }
    }
    
/*
 * Stats query
 */
    public function listMostSoldAdmin(){
        $result = $this->getRepository('Salle')->mostSold();
        return $result;
    }
    
    
/*
 * Fonctions de display
 * 
 */
    
    public function displayForAdmin(){
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
            $this->view->displayForAdmin($salles);
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
                $this->view->updateSalleForm($salles, '');
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
        $this->view->addSalleForm('');
    }
    


}