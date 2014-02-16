<?php
namespace Views;
abstract class Views{
    
    abstract function displayFicheDetail();
    
    abstract function displayListe();
    
    abstract function displayForAdmin();
    
    public static function getInstance(){
        return new self;
    }
    
    public function render($layout, $template, $parameters = array()){
//Prend en compte le fait que la classe fille va utiliser la fonction dans Backoffice\Controller\ClassxxController
        $dirViews = __DIR__.'/../../src/'.str_replace('\\','/', get_called_class().'/../../Views');
        $ex = explode('\\',get_called_class());
        var_dump($ex);
        $dirFile = str_replace('Views', '', $ex[2]);
        $template = '/contenu/'.$dirFile.'/'.$template;
        $layout = '/template/'.$layout;
        $menu = '/template/'.'menu.php';
        //var_dump($_SESSION);
        extract($parameters);
        
        ob_start();
            require $template;
            require $menu;
            $content = ob_get_clean();
            require $layout;
        return ob_end_flush();
    }
}
