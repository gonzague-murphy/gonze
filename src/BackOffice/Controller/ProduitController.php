<?php
namespace Backoffice\Controller;
USE Controller\Controller;


class ProduitController extends Controller{

/*
 * Ici les requetes nécessaire au pull produit
 * affichage
 */  
    public function listeAllSalle(){
        $salleController = new SalleController;
        $all = $salleController->listeAllForProducts();
        foreach($all as $objects){
            return $objects;
        }
    }
    
    /*public function listeAllPromo(){
        $promoController = new PromoController;
    }*/
    
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::ATTENTION REQUETE DE PULL!!!!!::::::::::
//SELECT s.titre FROM salle s, produit p WHERE s.id_salle=p.id_salle;
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::::::::::::::::::::::::::::::::::::
    
    
    public function listeProduitAdmin(){
        $produit = $this->getRepository('Produit');
        $produits = $produit->findAll();
        //var_dump($produits);
        if($produits == false){
            echo $this->msg = "<div class='error'>Désolé, aucun produit disponible pour le moment</div>";
        }
        else{
        $this->render('template_accueil.php', 'listeAdmin.php',array(
            'title'=>'Hello admin',
            'produits'=>$produits
        ));
        }
    }
    
    public function allowInsert($data = array()){
        $queryTable = $this->getRepository('Produit');
        $myResult = $queryTable->addProduit($data);
        if($myResult == false){
            echo "perdu!";
          }
        else{
            return $myResult;
          }
    }
    
    public function displayForm(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromoController;
        $codePromo = $promocont->listeAllForProducts();
        //var_dump($salles);
        $this->render('template_accueil.php', 'produitform.php',array(
            'title' => 'ohé',
            'salles' => $salles,
            'promotion'=>$codePromo   
        ));
    }
    
    public function displaySalleHasProduct(){
        $sallecont = new SalleController;
        $liste = $sallecont->salleHasProduct();
        $this->render('template_accueil.php', 'listenormal.php', array(
            'title'=>'Lokisalle',
            'liste' =>$liste
        ));
    }
    
    
}