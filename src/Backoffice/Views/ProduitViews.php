<?php
namespace Backoffice\Views;
USE Views\Views;
class ProduitViews extends Views{
    
    
    public function updateProd($arg){
        $this->partialRender('listenormal.php', array(
            'liste'=>$arg
        ), true);
    }
    
    public function displayListe($args){
        $this->render('template_accueil.php', 'listenormal.php', array(
            'title'=>'Toutes les salles',
            'liste'=>$args
        ), true);
    }
    
    public function displayFicheDetail($args, $avis) {
        $this->render('template_accueil.php', 'produitdetails.php', array(
            'title'=> $args['titre'],
            'liste'=> $args,
            'avis'=>$avis,
        ));
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'listeadmin.php', array(
            'title'=>'Toutes les salles',
            'liste' =>$result
        ));
    }
//:::::::::FORMULAIRES:::::::::
//:::::::::::::::::::::::::::::
    
    public function addForm($promotion, $salles, $msg){
        $this->render('template_accueil.php', 'produitform.php',array(
            'title' => 'Ajouter un produit',
            'promotion' => $promotion,
            'salles' => $salles,
            'msg'=>$msg
           ));
    }
    
    public function addFormPartial($promotion, $salles){
        $this->partialRender('produitform.php', array(
            'promotion' => $promotion,
            'salles' => $salles
        ));
    }
    
    public function updateForm($data = array(), $args = array(), $msg=''){
        $this->render('template_accueil.php', 'produitupdateform.php',array(
            'title'=>$args[0]->getTitre(),
            'result'=>$data,
            'liste' =>$args,
            'msg'=>$msg
        ));
    }
}

