<?php
namespace Backoffice\Views;
USE Views\Views;
class ProduitViews extends Views{
    
    
    public function displayListe($args){
        $this->render('template_accueil.php', 'listenormal.php', array(
            'title'=>'Lokisalle',
            'liste'=>$args
        ));
    }
    
    public function displayFicheDetail($args, $moreArgs) {
        $this->render('template_accueil.php', 'produitdetails.php', array(
            'title'=> $args['titre'],
            'liste'=> $args,
            'avis'=>$moreArgs
        ));
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'listeadmin.php', array(
            'title'=>'Lokisalle',
            'liste' =>$result
        ));
    }
//:::::::::FORMULAIRES:::::::::
//:::::::::::::::::::::::::::::
    
    public function addForm($promotion, $salles){
        $this->render('template_accueil.php', 'produitform.php',array(
            'title' => 'Lokisalle',
            'promotion' => $promotion,
            'salles' => $salles
           ));
    }
    
    public function updateForm($data = array(), $args = array()){
        $this->render('template_accueil.php', 'produitupdateform.php',array(
            'result'=>$data,
            'liste' =>$args
        ));
    }
}

