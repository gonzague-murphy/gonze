<?php
namespace Backoffice\Views;
USE Views\Views;

class MembreViews extends Views{
    
    
    
    public function displayListe(){
        echo "test";
    }
    
    public function displayFicheDetail() {
        echo "test";
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'membre.php', array(
            'title'=>'Lokisalle',
            'membres'=>$result
        ));
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

public function listeAllAdmin(){
        
    }
/*
 * Fonction de suppression
 */
     public function allowDelete(){
             $queryTable = $this->getRepository('Membre');
                 $queryTable->deleteMembre($_GET['id']);
                 $this->listeAllAdmin();
     } 
    
//fonction de test

    public function defaultDisplay(){
        $this->render('template_accueil.php','defaultPlaceholder.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
     public function signUpDisplay(){
        $this->render('template_accueil.php','formsignup.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
    }
    
    public function loginDisplay(){
        $this->render('template_accueil.php','loginform.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',

        ));
        
    }
    
    public function displayMe(){
        $me = $this->user;
        $this->render('template_accueil.php', 'profil.php', array(
            'title'=>'Mon Profil',
            'mesInfos'=>$me
        ));
    }
    
//fonction de test
    public function displayMembres(){
        
        $membre = $this->getRepository('Membre');
        $membres = $membre->getAllMembers();
        
            $this->render('layout.php','membre.php',array(
            'title'=>'Youpi-Coinz!',
            'subtitle'=>'juste pour etre sur',
            'membres'=>$membres
        ));
    }
}