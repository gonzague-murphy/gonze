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
        $querytable->addOrder($this->arrayPost);
        $this->view->displayFicheDetail($this->arrayPost);
        unset($_SESSION['panier']);
        PanierSessionHandler::initializeCart();
    }
}

