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
            //var_dump($id);
            $result = self::checkDouble($id);
            if( $result == false){
                $_SESSION['panier'][] = $data;
              }
            else{
                echo "Ce produit est déjà dans votre panier!";
                //var_dump($_SESSION);
                }
        }
        
     public static function dropFromCart($id){
         unset($_SESSION['panier'][$id]);
         array_values($_SESSION['panier']);
         //var_dump($_SESSION);
	}
        
    
    
    public static function checkDouble($arg){
        for($i=0;$i<sizeof($_SESSION['panier']);$i++){
                if($arg == $_SESSION['panier'][$i]['id_produit']){
                    return true;
                }
                else{
                    return false;
                }
                
            }
            
        }
       
}


