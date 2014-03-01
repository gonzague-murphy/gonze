<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class PromotionController extends Controller{
    
    
    
    public function listeAllForProducts(){
        $querytable = $this->getRepository('Promotion');
        $promo = $querytable->findAll();
        if($promo == false){
            $this->msg = "<div class='error'>Désolé, aucune promotion enregistrée pour l'instant</div>";
        }
        else{
            return $promo;
        }
        //echo $this->msg;
    }
    
    public function findPromoId($id){
       $queryTable = $this->getRepository('Promotion');
       $result = $queryTable->findById($id);
       return $result;
   }
   
   
   
/*
 * Add
 */
   
   public function addCodePromo(){
       if(isset($this->arrayPost)){
           $this->filterAddPromo($this->arrayPost);
           $this->displayForAdmin();
       }
   }
   
   public function filterAddPromo($data = array()){
       $this->clean($data);
       $querytable = $this->getRepository('Promotion');
       $querytable->addCodePromo($data);
   }
   
/*
 * Update
 */
   
   public function updateCodePromo(){
       if(isset($this->arrayPost)){
           $this->filterUpdatePromo($this->arrayPost);
           $this->displayForAdmin();
       }
   }
   
   public function filterUpdatePromo($data = array()){
       if(isset($this->arrayGet['id'])){
            $this->clean($data);
            $querytable = $this->getRepository('Promotion');
            $querytable->updateCodePromo($data, $this->arrayGet['id']);
       }
   }
   
/*
 * Delete
 */
   
   public function deletePromo(){
       if(isset($this->arrayGet['id'])){
           $queryTable = $this->getRepository('Promotion');
           $queryTable->deletePromo($this->arrayGet['id']);
           $this->displayForAdmin();
           
       }
   }
   
/*
 * Fonctions de display
 */
   
   public function displayForAdmin(){
       $querytable = $this->getRepository('Promotion');
       $promo = $querytable->findAll();
       $this->view->displayForAdmin($promo);
   }
   
   public function addCodePromoForm(){
        $this->view->addPromoForm();
    }
    
   public function updateCodePromoForm(){
       if(isset($this->arrayGet['id'])){
           $querytable = $this->getRepository('Promotion');
           $result = $querytable->findById($this->arrayGet['id']);
           $this->view->updatePromoForm($result);
       }
   }
  
}

