<?php
namespace Backoffice\Controller;
USE Controller\Controller;
USE \Component\PanierSessionHandler;

class CommandeController extends Controller{
    
   public function panierDisplay(){
        $cart = new PanierSessionHandler;
        $result = $cart::getPanier();
        //var_dump($_SESSION);
        $this->view->panierDisplay($result);
    }

    
/*
 * Add to cart
 */
      public function addToCart(){
        PanierSessionHandler::addToCart($this->arrayGet['id']);
        //var_dump($_SESSION);
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
        $querytable = $this->getRepository('Commande');
    }
}

