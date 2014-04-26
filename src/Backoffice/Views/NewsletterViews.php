<?php
namespace Backoffice\Views;
USE Views\Views;

class NewsletterViews extends Views{
    
    public function displayForAdmin($result){
        echo "";
    }
    
    public function displayNewsletterAdmin($msg=''){
        $this->render('template_accueil.php', 'newsletter.php', array(
            'title'=>'Newsletter',
            'msg'=>$msg
        ));
    }
    
    public function displayListe($args){
        echo "test";
    }
}

