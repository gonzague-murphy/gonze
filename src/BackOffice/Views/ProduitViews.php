<?php
namespace Backoffice\Views;
USE Views\Views;
class ProduitViews extends Views{
    
    public function updateProd($arg){
        echo "<div id='galerie'>";
        echo "<ul class='produit'>";
            foreach($arg as $salle=>$unit){
                echo "<li>";
                echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
                echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'><img src='".$unit['photo']."'></a><br/>";
                echo "<a href='?controller=CommandeController&action=addToCart&id=".$unit['id_produit']."' class='bouton'>Ajouter au panier</a>";
                echo "</li>";
                }
        echo "</ul>";
        echo "</div>";
    }
    
    
    public function displayListe($args){
        $this->render('template_accueil.php', 'listenormal.php', array(
            'title'=>'Lokisalle',
            'liste'=>$args
        ));
    }
    
    public function displayFicheDetail($args, $moreArgs) {
        $this->render('template_accueil.php', 'produitdetails.php', array(
            'title'=> $args['titre'],
            'liste'=> $args,
            'avis'=>$moreArgs
        ));
    }
    
    public function displayForAdmin($result){
        $this->render('template_accueil.php', 'listeadmin.php', array(
            'title'=>'Lokisalle',
            'liste' =>$result
        ));
    }
//:::::::::FORMULAIRES:::::::::
//:::::::::::::::::::::::::::::
    
    public function addForm($promotion, $salles){
        $this->render('template_accueil.php', 'produitform.php',array(
            'title' => 'Lokisalle',
            'promotion' => $promotion,
            'salles' => $salles
           ));
    }
    
    public function updateForm($data = array(), $args = array()){
        $this->render('template_accueil.php', 'produitupdateform.php',array(
            'result'=>$data,
            'liste' =>$args
        ));
    }
}

