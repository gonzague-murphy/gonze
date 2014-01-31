<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class PromotionController extends Controller{
    
    public function listeAllForProducts(){
        $querytable = $this->getRepository('Promotion');
        $promo = $querytable->findAll();
        if($promo == false){
            $this->msg = "<div class='error'>Désolé, aucune promotion enregistrée pour l'instant</div>";
        }
        else{
            return $promo;
        }
        echo $this->msg;
    }
}

