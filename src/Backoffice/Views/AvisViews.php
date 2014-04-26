<?php
namespace Backoffice\Views;
USE Views\Views;

class AvisViews extends Views{
    
    public function displayListe($args){
        $this->partialRender('listecomments.php', array(
            'avis'=>$args
        ));
    }
    
    public function displayForAdmin($args){
        $this->render('template_accueil.php', 'listeadmin.php', array(
            'title'=>'Gérer les avis',
            'avis'=>$args
        ));
    }
    
    public function bestRankAdmin($data){
        $this->render('template_accueil.php', 'ranks.php', array(
            'title'=>'Top 5 des Salles les mieux notées',
            'salle'=>$data
        ));
    }
}
