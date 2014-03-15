<?php
//var_dump($liste);
echo "<div id='galerie'>";
echo "<ul class='produit'>";
$i = 1;
foreach($liste as $salle=>$unit){
    $i++;
    echo "<li>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'><img src=''></a><br/>";
    echo "<a href='?controller=CommandeController&action=addToCart&id=".$unit['id_produit']."'>Ajouter au panier</a>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";
