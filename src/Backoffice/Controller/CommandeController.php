<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE \Component\PanierSessionHandler;

class CommandeController extends Controller{
    
    
   public function panierDisplay($msg=''){
        $cart = new PanierSessionHandler;
        $result = $cart::getPanier();
        $this->view->panierDisplay($result, $msg);
    }

    
/*
 * Add to cart
 */
      public function addToCart(){
        $msg= PanierSessionHandler::addToCart($this->arrayGet['id']);
        header('Location: ?controller=CommandeController&action=panierDisplay&msg='.$msg);
        exit();
    }
  
/*
 * Remove from cart
 */
      public function removeFromCart(){
          PanierSessionHandler::dropFromCart($this->arrayGet['id']);
          header('Location: ?controller=CommandeController&action=panierDisplay');
          exit();
      }
      
/*
 * Recap and apply Promo
 */
      public function recap($reduction){
          $this->view->recap($this->cart, $reduction);
      }
    
    
    
/*
 * Add
 */
    public function makeOrder(){
        $prodCont = new ProduitController;
        $prodCont->updateAfterOrder();
        $idCommande = $this->getRepository('Commande')->addOrder($this->arrayPost);
        $this->updateDetails($idCommande);
        $this->view->displayFicheDetail($this->arrayPost);
        unset($_SESSION['panier']);
        PanierSessionHandler::initializeCart();
        exit();
    } 
    
/*
 * Add to details_commande
 */
    public function updateDetails($id_commande){
        $cart = PanierSessionHandler::getPanier();
        $detailCont = new DetailsCommandeController;
        foreach($cart as $key=>$value){
            $detailCont->insertDetails($id_commande, $value['id_produit']);
        }
    }
    
/*
 * Public function isset Promo
 */
    
    public function dispatchOrder(){
        if(isset($this->arrayPost['promo']) && !empty($this->arrayPost['promo'])){
            $myBool = $this->checkCode($this->arrayPost['promo']);
            //var_dump($myBool);
            if(is_null($myBool)){
                $this->panierDisplay('Le code de promotion est invalide!');
            }
            else{
                $this->recap($myBool);
            }
        }
        else{
            $this->recap(0);
        }
    }
    
/*
 * Check Promo Code
 */
    public function checkCode($data){
        //var_dump($data, $this->cart);
            foreach($this->cart as $key){
                if(in_array($data, $key)){
                    return $key['reduction'];
                }
            }
    }
    
/*
 * Boucle pour peupler les details commande
 */
    public function loopDetails($all, DetailsCommandeController $detailsCont){
        $detail = array();
        foreach($all as $key=>$value){
            $detail[] = $detailsCont->findById($value->getIdCommande());
        }
        return $detail;
    }
    
/*
 * Gérer les commandes
 */
    public function mixDetail(){
        $all = $this->getRepository('Commande')->findAll();
        $years = $this->allYears();
        $detailsCont = new DetailsCommandeController;
        $details = $this->loopDetails($all, $detailsCont);
        $this->view->mixDetail($all, $details, $years);
    }
    
/*
 * Toutes les commande par id_membre
 */
    
    public function getMyOrders($id){
        return $result = $this->getRepository('Commande')->findById($id);
    }
/*
 * Toutes les annees des commandes
 */
    public function allYears(){
        return $result = $this->getRepository('Commande')->returnAllYears();
    }
    
/*
 * Query stats most Expensive
 */
    
    public function mostExpensive(){
        $result = $this->getRepository('Commande')->mostExpensive();
        return $result;
    }
    
/*
 * Chiffre d'affaire
 */
    
    public function CaAdd(){
        $this->clean($this->arrayGet);
        $result = $this->getRepository('Commande')->findAll();
        echo $this->calculateCA($this->arrayGet['year'], $result);
    }
   
    public function calculateCA($year, $commandes){
        $chiffreAffaire = 0;
        foreach($commandes as $key=>$value){
            $format = date("Y", strtotime($value->getDate()));
            if($format == $year){
                $chiffreAffaire += $value->getMontant();
            }
        }
        return "Notre chiffre d'affaire s'élève à ".$chiffreAffaire." euros pour l'année ".$year."";
    }
}

