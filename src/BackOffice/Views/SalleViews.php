<?php
namespace Backoffice\Views;
USE Views\Views;
class SalleViews extends Views{
    
    
    public function displayListe($args){
        echo "test";
    }
    
    public function displayFicheDetail($args) {
        echo "";
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'salle.php', array(
            'title'=>'Bienvenue, Admin',
            'salles'=>$result
          ));
    }
//::::::::::FORMULAIRES:::::::::::::
//::::::::::::::::::::::::::::::::::
    
    public function addSalleForm(){
        $this->render('template_accueil.php', 'salleformadd.php', array(
            'title'=> 'Lokisalle'
        ));
    }
    
    public function updateSalleForm($args){
        $this->render('template_accueil.php', 'salleform.php',array(
            'title'=>'Bienvenue, Admin',
            'salles'=>$args
        ));
    }
}

