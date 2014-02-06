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
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::ATTENTION REQUETE DE PULL!!!!!::::::::::
//SELECT s.titre FROM salle s, produit p WHERE s.id_salle=p.id_salle;
//::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::::::::::::::::::::::::::::::::::::
    
/*
 * Insert
 */    
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
    
    public function lanceSaveProduct(){
        if(isset($_POST)){
            $this->allowInsert($_POST);
            $this->displaySalleHasProduct();
        }
    }
    
/*
 * Update
 * 
 */   
    

/*
 * Delete
 * 
 */
    public function allowDelete(){
        if(isset($_GET['id'])){
            $queryTable = $this->getRepository('Produit');
            $result = $queryTable->findById($_GET['id']);
            if($result !== false){
                $queryTable->deleteProduit($_GET['id']);
                $this->displaySalleHasProduct();
            }
            else{
                $this->msg = "Ce produit n'existe pas!";
            }
        }
        echo $this->msg;
    }
    
    
/*
 * Fonction de display
 */
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
    
    public function displayForm(){
        $sallecont = new SalleController;
        $salles = $sallecont->listeAllForProducts();
        $promocont = new PromotionController;
        $promotion = $promocont->listeAllForProducts();
        $this->render('template_accueil.php', 'produitform.php',array(
            'title' => 'Lokisalle',
            'promotion' => $promotion,
            'salles' => $salles));
    }
    
    public function displayUpdateProduit(){
        if(isset($_GET['id'])){
            $queryTable = $this->getRepository('Produit');
            $result = $queryTable->findById($_GET['id']);
            $sallecont = new SalleController;
            $resultSalle = $sallecont->findSalleId($result->id_salle);
            $touteLesSalles = $sallecont->listeAllForProducts();
            $promocont = new PromotionController;
            $promotion = $promocont->listeAllForProducts();
            $thispromo = $promocont->findPromoId($result->id_promo);
            $this->render('template_accueil.php', 'produitupdateform.php',array(
                'title'=>'Lokisalle',
                'produit'=>$result,
                'salle' =>$resultSalle,
                'promo'=>$thispromo,
                'allSalles'=>$touteLesSalles,
                'allPromo'=>$promotion
            ));
        }
    }
    
    public function displaySalleHasProduct(){
        $sallecont = new SalleController;
        $liste = $sallecont->salleHasProduct();
        $this->render('template_accueil.php', 'listeadmin.php', array(
            'title'=>'Lokisalle',
            'liste' =>$liste
        ));
    }
    
    public function displaySalleHasProductMembre(){
        $sallecont = new SalleController;
        $listeSalle = $sallecont->salleHasProduct();
        $this->render('template_accueil.php', 'listenormal.php', array(
            'title'=>'Lokisalle',
            'liste'=>$listeSalle
        ));
    }
    
    
}