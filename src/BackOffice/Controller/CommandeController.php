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
    
    public function unsetItem(){
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

