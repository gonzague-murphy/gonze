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
       if(isset($_POST)){
           $this->filterAddPromo($_POST);
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
       if(isset($_POST)){
           $this->filterUpdatePromo($_POST);
           $this->displayForAdmin();
       }
   }
   
   public function filterUpdatePromo($data = array()){
       if(isset($_GET['id'])){
            $this->clean($data);
            $querytable = $this->getRepository('Promotion');
            $querytable->updateCodePromo($data, $_GET['id']);
       }
   }
   
/*
 * Delete
 */
   
   public function deletePromo(){
       if(isset($_GET['id'])){
           $queryTable = $this->getRepository('Promotion');
           $queryTable->deletePromo($_GET['id']);
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
       if(isset($_GET['id'])){
           $querytable = $this->getRepository('Promotion');
           $result = $querytable->findById($_GET['id']);
           $this->view->updatePromoForm($result);
       }
   }
  
}

