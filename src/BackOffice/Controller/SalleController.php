<?php

namespace Backoffice\Controller;
USE Controller\Controller;


class SalleController extends Controller{
    
/*
 * Fonctions de display
 * 
 */
    
    public function listeAllAdmin(){
        //var_dump(\Backoffice\Controller\MembreController::getUser());
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
        //var_dump($salles);
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
    
    public function listeAllForProducts(){
        $queryTable = $this->getRepository('Salle');
        $salles = $queryTable->findAll();
         if($salles == false){
            echo $this->msg = "<div class='error'>Désolé, aucune salle enregistrée pour l'instant</div>";
        }
        else{
            return $salles;
         }
    
    }
    
    public function displaySalleForm(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            }
            else{
            $this->render('template_accueil.php', 'salleform.php',array(
            'title'=>'Bienvenue, Admin',
            'salles'=>$salles
        ));
            }
        }
        else{
            $this->render('template_accueil.php', 'salle.php',array(
            'title'=>'Bienvenue, Admin',
        ));
        }
    }
    
    public function findAllById(){
        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id'], ENT_QUOTES);
            $queryTable = $this->getRepository('Salle');
            $salles = $queryTable->findById($id);
            if($salles == false){
                echo "Cette salle n'existe pas!";
            
                }
    
        }
    
    }

}