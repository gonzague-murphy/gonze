<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class DefaultController extends Controller{
    
    public static $counter;
    
    public function __construct(){
        self::$counter++;
    }
    public function indexDisplay(){
        $this->render('template_accueil.php','defaultPlaceholder.php', array(
            'title'=>'Vous etes sur l\'index'
        ));
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

