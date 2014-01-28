<?php

namespace Backoffice\Controller;
USE Controller\Controller;


class SalleController extends Controller{
    public function listeAllAdmin(){
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
         if($salles == false){
            echo $this->msg = "<div class='error'>Désolé, aucune salle enregistrée pour l'instant</div>";
        }
        else{
            $this->render('template_accueil.php', 'salle.php', array(
                'title'=>'Bienvenue, Admin',
                'salles'=>$salles
            ));
         }
    }
}

