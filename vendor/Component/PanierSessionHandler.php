<?php
namespace Component;

class PanierSessionHandler{
    
    protected static $panier;
    
    public function __construct(){
        $this->castPanier();
    }
    
    public function castPanier(){
        if(isset($_SESSION['panier'])){
            self::$panier = $_SESSION['panier'];
        }
        return self::$panier;
    }
    
    public static function initializeCart(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }
    
    public static function getPanier(){
        $instance = new self;
        return $instance::$panier;
    }
    
    public static function addToCart($id){
            $cont = new \Backoffice\Controller\ProduitController;
            $data = $cont->findById($id);
            $result = self::checkDouble($id);
            if($result == false){
                $_SESSION['panier'][] = $data;
              }
            else{
                echo "Ce produit est déjà dans votre panier!";
                }
        }
        
     public static function dropFromCart($id){
         unset($_SESSION['panier'][$id]);
         $_SESSION['panier'] = array_values($_SESSION['panier']);
         //var_dump($_SESSION);
	}
        
    
    
     public static function checkDouble($arg){
        $a = false;
        foreach($_SESSION['panier'] as $key=>$value){
            foreach($value as $unit=>$data){
                if($unit == 'id_produit' && $data == $arg){
                    return $a = true;   
                }
            }
        }
        return $a;
      }
}
