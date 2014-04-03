<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class ProduitController extends Controller{

/*
 * Ici les requetes nécessaire au pull produit
 * affichage

    public function listeAllSalle(){
        $salleController = new SalleController;
        $all = $salleController->listeAllForProducts();
        foreach($all as $objects){
            return $objects;
        }
    }*/
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::ATTENTION REQUETE DE PULL!!!!!::::::::::
//SELECT s.titre FROM salle s, produit p WHERE s.id_salle=p.id_salle;
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::::::::::::::::::::::::::::::::::::
    
/*
 * Insert
 */    
    public function allowInsert($data = array()){
        $queryTable = $this->getRepository('Produit');
        $myResult = $queryTable->addProduit($data);
        if($myResult == false){
            echo "perdu!";
          }
        else{
            return $myResult;
          }
    }
    
     public function lanceSaveProduct(){
        if(isset($this->arrayPost)){
            $this->allowInsert($this->arrayPost);
            $this->displaySalleHasProduct();
        }
    }
    
/*
 * Update
 * 
 */   public function allowUpdate($id, $data=array()){
            $queryTable= $this->getRepository('Produit');
            $retour = $queryTable->updateProduit($data, $id);
 }
 
      public function lanceUpdate(){
            if(isset($this->arrayPost) && isset($this->arrayGet['id'])){
                $this->allowUpdate($this->arrayPost, $this->arrayGet['id']);
                $this->displaySalleHasProduct();
            }
        }
    

/*
 * Delete
 * 
 */
      public function allowDelete(){
        if(isset($this->arrayGet['id'])){
            $queryTable = $this->getRepository('Produit');
            $result = $queryTable->findById($this->arrayGet['id']);
            if($result !== false){
                $queryTable->deleteProduit($this->arrayGet['id']);
                $this->displaySalleHasProduct();
            }
            else{
                $this->msg = "Ce produit n'existe pas!";
            }
        }
        echo $this->msg;
    }
    
      public function findById($id){
        $table = $this->getRepository('Produit');
        $result = $table->findById($id);
        return $result;
    }
    
/*
 * Date control
 */
    

/*
 * Fonction de display
 */
    
/*
 * Page d'accueil
 */
    public function displayMostRecent(){
        $table = $this->getRepository('Produit');
        $produit = $table->selectMostRecent();
        return $produit;
    }
   
////////////////////////////////////
    
/*
 * Recherche par ville
 */
    
    public function triVille(){
        $this->clean($this->arrayGet);
        $result = $this->getRepository('Produit')->selectByCity(ucfirst($this->arrayGet['id']));
        $this->view->displayListe($result);
    }
/*
 * Trier par capacite
 */
    
    public function triCapa($capa){
        $cleanData = $this->clean($capa);
        $result = $this->getRepository('Produit')->selectByCapacity($cleanData);
        return $result;
    }
    
      public function formOption(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        return array($salles, $promotion);
    }
    
      public function displayForm(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        $this->view->addForm($promotion, $salles);
    }
    
       public function displayUpdateProduit(){
        if(isset($this->arrayGet['id'])){
            $queryTable = $this->getRepository('Produit');
            $result = $queryTable->findById($this->arrayGet['id']);
            $choices = $this->formOption();
            $this->view->updateForm($result, $choices);
        }
    }
    
       public function displaySalleHasProduct(){
        $value = $this->getRepository('Produit');
        $liste = $value->selectHasProduct();
        $this->view->displayForAdmin($liste);
    }
    
      public function displaySalleHasProductMembre(){
        $value = $this->getRepository('Produit');
        $listeSalle = $value->selectHasProduct();
        $this->view->displayListe($listeSalle);
    }
    
      public function displayProductDetail(){
        $me = $this->getRepository('Produit');
        $result = $me->findById($this->arrayGet['id']);
        $avis = new AvisController();
        $allavis = $avis->findBySalle($this->arrayGet['id']);
        $this->view->displayFicheDetail($result, $allavis);
    }
    
}