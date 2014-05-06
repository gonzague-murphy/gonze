<?php
//var_dump($liste);
echo "<div id='galerie'>";
echo "<ul class='produit'>";
foreach($liste as $salle=>$unit){
    echo "<li>";
    echo "<div class='details'>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'><img src='".$unit['photo']."'></a>";
    echo "<div class='flaticon-ville'>".$unit['ville']."</div>";
    echo "<div class='flaticon-calend'>Du ".date("d-m-Y", strtotime($unit['date_arrivee']))." au ".date("d-m-Y", strtotime($unit['date_depart']))."</div>";
    echo "<div class='flaticon-capa'>".$unit['capacite']." personnes</div>";
    echo "<div class='flaticon-euro'>".$unit['prix']." euros</div>";
    echo "</div>";
    echo "<div class='linksProd'>";
    echo "<span><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>&#10095; Voir la fiche détaillée</a>";
    if(isset($_SESSION['user'])){
        echo "<a href='?controller=CommandeController&action=addToCart&id=".$unit['id_produit']."' class='bouton'>+ Ajouter au panier</a>";
    }
    else{
        echo "<a href='?controller=MembreController&action=loginDisplay' class='flyLogin'>&#10095; Connectez-vous pour l'ajouter au panier</a>";
    }
    echo "</div>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";
