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
        echo "";
    }
}
