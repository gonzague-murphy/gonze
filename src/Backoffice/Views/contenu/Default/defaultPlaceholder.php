<?php //var_dump($salle); 
if(isset($msg)){ 
    if(is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div><br/>";
        }
    }
    
    else{
        echo $msg;
    }
}
?>
<a href="#" class="unslider-arrow prev"><img src="../src/Backoffice/Views/img/icons/rew.png" />&nbsp;&nbsp;&nbsp;</a>
<a href="#" class="unslider-arrow next"><img src="../src/Backoffice/Views/img/icons/fwd.png" /></a>
<div class="carousel">
    <ul>
        <li><img src="../src/Backoffice/Views/img/carousel/slide1.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide2.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide3.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide4.jpg" /></li>
    </ul>
</div>
        <div id='galerie'>
            <div class="titleHome">
            <h3 class="categorie">Nos 3 dernières offres</h3>
            </div>
            <ul class="produit">
            <?php
            foreach($salle as$key=>$value){
            echo "<li>";
            echo "<div class='details'>";
            echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$value['id_produit']."'>".$value['titre']."</a></h4>";
            echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$value['id_produit']."'><img src='".$value['photo']."'></a>";
            echo "<div class='flaticon-ville'>".$value['ville']."</div>";
            echo "<div class='flaticon-calend'>Du ".date("d-m-Y", strtotime($value['date_arrivee']))." au ".date("d-m-Y", strtotime($value['date_depart']))."</div>";
            echo "<div class='flaticon-capa'>".$value['capacite']." personnes</div>";
            echo "<div class='flaticon-euro'>".$value['prix']." euros</div>";
            echo "</div>";
            echo "<div class='linksProd'>";
            echo "<span><a href='?controller=ProduitController&action=displayProductDetail&id=".$value['id_produit']."'>&#10095; Voir la fiche détaillée</a></span>";
            if(isset($_SESSION['user'])){
                echo "<a href='?controller=CommandeController&action=addToCart&id=".$value['id_produit']."' class='bouton'>+ Ajouter au panier</a>";
            }
            else{
                echo "<span><a href='?controller=MembreController&action=loginDisplay' class='flyLogin'>&#10095; Connectez-vous pour l'ajouter au panier</a></span>";
            }
            echo "</div>";
            echo "</li>";
            }
?>
            </ul>
        </div>

<div id="partenaires">
    <div class="titleHome">
    <h3 class="categorie">Ils nous ont fait confiance</h3>
    </div>
    <ul>
        <li><img src='../src/Backoffice/Views/img/icons/entreprise1.png' alt='partenaire1' /></li>
        <li><img src='../src/Backoffice/Views/img/icons/entreprise4.jpg' alt='partenaire4' /></li>
        <li><img src='../src/Backoffice/Views/img/icons/entrprise2.jpg' alt='partenaire2' /></li>
        <li><img src='../src/Backoffice/Views/img/icons/entreprise3.jpg' alt='partenaire3' /></li>
    </ul>
</div>

