<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class ProduitController extends Controller{

    
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
            $this->compareTwoDates($this->arrayPost['date_arrivee'], $this->arrayPost['date_depart']);
            $prod = $this->makeObjectProduit();
            $obj = $this->formatDateObject($prod);
            $this->checkDoubleDate($obj);
            if(!empty($this->msg)){
                $this->displayForm();
                echo $this->msg;
            }
            else{
                $this->allowInsert($obj);
                header('Location: ?controller=ProduitController&action=displaySalleHasProductAdmin');
                exit();
            }
        }
    }
    
/*
 * Update
 * 
 */   public function allowUpdate($id, $data=array()){
     //var_dump($data);
            $queryTable= $this->getRepository('Produit');
            $queryTable->updateProduit($data, $id);
 }
 
      public function lanceUpdate(){
            if(isset($this->arrayPost) && isset($this->arrayGet['id'])){
                $this->clean($this->arrayPost);
                $this->checkForEmptyFields($this->arrayPost);
                $this->compareTwoDates($this->arrayPost['date_arrivee'], $this->arrayPost['date_depart']);
                $prod = $this->makeObjectProduit();
                $obj = $this->formatDateObject($prod);
                $this->checkDoubleDate($obj);
                if(empty($this->msg)){
                    $this->allowUpdate($this->arrayGet['id'], $prod);
                    $this->displaySalleHasProductAdmin();
                }
                else{
                    $this->displayUpdateProduit();
                }
            }
        }
        
        public function updateAfterOrder(){
            $queryTable = $this->getRepository('Produit');
            $arrayObjects = $this->makeObjectFromCart();
            for($i=0; $i <= (\sizeof($arrayObjects)-1);$i++){
                
                $queryTable->updateState($arrayObjects[$i]->id_produit);
            }
        }

/*
 * Date control
 */
    
       
      public function formatDateForInsert($var){
          $format = date("Y-m-d H:i:s", strtotime($var));
          return $format;
      }
      
      public static function formatDateForDisplay($var){
          $format = date("d-m-Y H:i:s", strtotime($var));
          return $format;
      }
      
      public function checkDoubleDate(\Entity\Produit $object){
          $dateObject = new \DateTime($this->formatDateForInsert($object->date_arrivee));
          $result = $dateObject->format('Y-m');
          $number = $this->getRepository('Produit')->checkForDoubles($object->salle, $result);
          //var_dump($number);
          if(!is_numeric($number)){
                  $dateUser = $dateObject->format('Y-m-d');
                  //var_dump($dateUser);
                  $myBool = $this->dateInRange($number[0]->date_arrivee, $number[0]->date_depart, $dateUser);
                  if($myBool == true){
                      $this->msg = 'Il existe déjà un produit couvrant les mêmes dates sur la même salle!';
                      return $this->msg;
                  }
              }
          
          else{
              return false;
          }
      }
      
/*
 * Check for Range Date
 */
      
      public function dateInRange($date_arr, $date_dep, $date_user){
          $start_ts = strtotime($date_arr);
          $end_ts = strtotime($date_dep);
          $user_ts = strtotime($date_user);
          return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
      }

/*
 * Check if booking date is inferior to today
 */
    
/*
 * Make Object
 * 
 */
       public function makeObjectProduit(){
            $prod = new \Entity\Produit;
            $this->clean($this->arrayPost);
           foreach($this->arrayPost as $key=>$value){
                $prod->$key = $value;
       }
            return $prod;
   }
   
       public function makeObjectFromCart(){
           $cart = \Component\PanierSessionHandler::getPanier();
           $array = array();
           foreach($cart as $key=>$value){
               $prod = new \Entity\Produit;
               foreach($value as $unit=>$data){
                    $prod->$unit = $data;
            }
            $array[] = $prod;
         }
         return $array;
       }
   
/*
 * Format Object
 */
   
       public function formatDateObject(\Entity\Produit $obj){
           $dateA = $obj->getDateArrivee();
           $obj->setDateArrivee($this->formatDateForInsert($dateA));
           $dateD = $obj->getDateDepart();
           $obj->setDateDepart($this->formatDateForInsert($dateD));
           return $obj;
       }
       
/*
 * Pad Numbers
 */
       public function paddNumbers($numbers){
            return $data = sprintf("%02s", $numbers);
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
                $this->displaySalleHasProductAdmin();
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
        $result = $this->getRepository('Produit')->selectByCity(ucfirst($this->arrayGet['ville']));
        //var_dump($result);
        $this->view->updateProd($result);
    }
/*
 * Trier par capacite
 */
    
    public function triState(){
        $this->clean($this->arrayGet);
        $result = $this->getRepository('Produit')->selectByState($this->arrayGet['etat']);
        $this->view->updateState($result);
    }

/*
 * Recherche à la loupe
 */
    
    public function rechercheSite(){
        $data = array();
        $this->clean($this->arrayPost);
        $this->checkForEmptyFields($this->arrayPost);
        if(empty($this->msg)){
            $numPadded = $this->paddNumbers($this->arrayPost['mois']);
            $result1 = $this->getRepository('Produit')->mainSearchOne($numPadded, $this->arrayPost['annee']);
            foreach($result1 as $key=>$value){
                $data[$key] = $this->getRepository('Produit')->mainSearchTwo($value['id_produit'], $this->arrayPost['motCle']);
            }
            //var_dump($data);
            return $data;
        }
    }
/*
 * Affichage de la Recherche
 * 
 */
    
    
    public function customSearch(){
        $result = $this->rechercheSite();
        $vars = $this->arrayPost;
        if(!empty($result)){
            $this->view->displaySearchResult($vars, $result);
        }
        else{
            $this->view->displaySearchResult($vars, '');
        }
    }
    
      public function formOption($id){
        $sallecont = new SalleController;
        $salles = $sallecont->findById($id);
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        return array($salles, $promotion);
    }
    
      public function displayForm(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        $this->view->addForm($promotion, $salles, $this->msg);
    }
    
    public function formOnly(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        $this->view->addFormPartial($promotion, $salles);
    }
    
       public function displayUpdateProduit(){
        if(isset($this->arrayGet['id'])){
            $queryTable = $this->getRepository('Produit');
            $result = $queryTable->findById($this->arrayGet['id']);
            //var_dump($result);
            $choices = $this->formOption($result['id_salle']);
            $this->view->updateForm($result, $choices, $this->msg);
        }
    }
    
       public function displaySalleHasProductAdmin(){
        $value = $this->getRepository('Produit');
        $liste = $value->selectHasProductAdmin();
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
        $tousLesAvis = $avis->findBySalle($result['id_salle']);
        $this->view->displayFicheDetail($result, $tousLesAvis);
    }
    
}