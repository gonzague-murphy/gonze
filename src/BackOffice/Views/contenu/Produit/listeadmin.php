<?php
//var_dump($liste);
echo "<div id='galerie'>";
echo "<ul class='produit'>";
echo "<a href='?controller=ProduitController&action=displayForm'>Ajouter un produit</a><br/>";
$i = 1;
foreach($liste as $salle=>$unit){
    $i++;
    echo "<li>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=allowDelete&id=".$unit['id_produit']."'>X---</a>";
    echo "<a href='?controller=ProduitController&action=displayUpdateProduit&id=".$unit['id_produit']."'>Update</a>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";


