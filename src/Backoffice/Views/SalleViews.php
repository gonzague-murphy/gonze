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
    
    public function addSalleForm($msg){
        $this->render('template_accueil.php', 'salleformadd.php', array(
            'title'=> 'Ajouter une salle',
            'msg'=>$msg
        ));
    }
    
    public function updateSalleForm($args, $msg){
        $this->render('template_accueil.php', 'salleform.php',array(
            'title'=>'Modifier une salle',
            'salles'=>$args,
            'msg'=>$msg
        ));
    }
}

