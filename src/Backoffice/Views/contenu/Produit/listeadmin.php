<?php
//var_dump($liste);
echo "<div id='galerie'>";
echo "<a class='adminAdd' href='?controller=ProduitController&action=displayForm'><span>+</span>Ajouter un produit</a><br/>";
echo "<ul class='produit'>";
foreach($liste as $salle=>$unit){
    if($unit['etat'] == 1){
        echo "<li class='reserved'>";
        echo "<p>Reservée!</p>";
    }
    else{
        echo "<li>";
    }
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<img src='".$unit['photo']."'/>";
    echo "<a href='?controller=ProduitController&action=allowDelete&id=".$unit['id_produit']."' class='bouton'>Supprimer</a>";
    echo "<a href='?controller=ProduitController&action=displayUpdateProduit&id=".$unit['id_produit']."' class='bouton'>Modifier</a>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";


