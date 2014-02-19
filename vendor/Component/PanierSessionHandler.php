<?php
namespace Component;

class PanierSessionHandler{
    
    protected static $panier;
    
    public function __construct(){
        $this->castPanier();
    }
    
    public function castPanier(){
        if(isset($_SESSION['panier'])){
            self::$panier = self::initializeCart();
        }
        return self::$panier;
    }
    
    public static function initializeCart(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }
    
    public static function getPanier(){
        return self::$panier;
    }
    
    public static function addToCart(){
        if(isset($_GET['id'])){
            $cont = new \Backoffice\Controller\ProduitController;
            $data = $cont->findById($_GET['id']);
            var_dump(self::checkDouble($data));
            if(self::checkDouble($data) == false){
                $_SESSION['panier'][] = $data;
              }
            else{
                echo "Ce produit est déjà dans votre panier!";
                }
            }
        }
        
    
    
    public static function checkDouble($data = array()){
        for($i=0;$i<sizeof($_SESSION['panier']);$i++){
                $position_article = in_array($data['id_produit'], $_SESSION['panier'][$i]);
            }
            return $position_article;
        }
}


