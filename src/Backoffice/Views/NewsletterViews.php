<?php
namespace Backoffice\Views;
USE Views\Views;

class NewsletterViews extends Views{
    
    public function displaySubscribe(){
        $this->render('template_accueil.php', 'thankyou.php', array(
            'title'=>'Inscription Newsletter'
        ));
    }
    
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

