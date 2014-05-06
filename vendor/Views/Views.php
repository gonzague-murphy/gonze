<?php
namespace Views;

abstract class Views{
    
    //abstract function displayFicheDetail($args);
    
    abstract function displayListe($args);
    
    abstract function displayForAdmin($args);
    
    
    public function render($layout, $template, $parameters = array(), $sort=false){
//Prend en compte le fait que la classe fille va utiliser la fonction dans Backoffice\Controller\ClassxxController
        $dirViews = __DIR__.'/../../src/'.str_replace('\\','/', get_called_class().'/../../Views');
        $ex = explode('\\',get_called_class());
        //var_dump($ex);
        $dirFile = str_replace('Views', '', $ex[2]);
        $template = $dirViews.'/contenu/'.$dirFile.'/'.$template;
        $layout = $dirViews.'/template/'.$layout;
        //var_dump($_SESSION);
        $s = $dirViews.'/template/'.'selectTown.php';
        extract($parameters);
        
        ob_start();
        if($sort == true){
                require($s);
            }
            require $template;
            
            $content = ob_get_clean();
            require $layout;
        return ob_end_flush();
    }
    
    public function partialRender($template, $parameters = array(), $sort=false){
        $dirViews = __DIR__.'/../../src/'.str_replace('\\','/', get_called_class().'/../../Views');
        $ex = explode('\\',get_called_class());
        //var_dump($ex);
        $dirFile = str_replace('Views', '', $ex[2]);
        $template = $dirViews.'/contenu/'.$dirFile.'/'.$template;
        $s = $dirViews.'/template/'.'selectTown.php';
        extract($parameters);
        
        ob_start();
            if($sort == true){
                require_once($s);
            }
            $content = ob_get_clean();
            
            require_once($template);
        return ob_end_flush();
    }
}
