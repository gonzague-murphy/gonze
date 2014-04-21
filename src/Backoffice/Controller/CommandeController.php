<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE \Component\PanierSessionHandler;

class CommandeController extends Controller{
    
   public function panierDisplay(){
        $cart = new PanierSessionHandler;
        $result = $cart::getPanier();
        $this->view->panierDisplay($result);
    }

    
/*
 * Add to cart
 */
      public function addToCart(){
        PanierSessionHandler::addToCart($this->arrayGet['id']);
        //var_dump($_SESSION);
        $this->panierDisplay();
    }
  
/*
 * Remove from cart
 */
      public function removeFromCart(){
          PanierSessionHandler::dropFromCart($this->arrayGet['id']);
          $this->panierDisplay();
      }
    
    
    
/*
 * Add
 */
    public function makeOrder(){
        $prodCont = new ProduitController;
        $prodCont->updateAfterOrder();
        $querytable = $this->getRepository('Commande');
        $idCommande = $querytable->addOrder($this->arrayPost);
        $this->updateDetails($idCommande);
        $this->view->displayFicheDetail($this->arrayPost);
        unset($_SESSION['panier']);
        PanierSessionHandler::initializeCart();
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
 * Gérer les commandes
 */
    public function displayForAdmin(){
        $all = $this->getRepository('Commande')->findAll();
        $this->view->displayForAdmin($all);
    }
}

