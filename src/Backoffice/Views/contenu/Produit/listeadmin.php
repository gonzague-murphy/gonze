<?php
echo "<div id='galerie'>";
echo "<a href='?controller=ProduitController&action=displayForm' class='add'><span>+</span>Ajouter un produit</a><br/>";
echo "<ul class='produit'>";
foreach($liste as $salle=>$unit){
    if($unit['etat'] == 1){
        echo "<li class='reserved'>";
        echo "<p>Reservée!</p>";
    }
    else{
        echo "<li>";
    }
    echo "<div class='details'>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'><img src='".$unit['photo']."'></a>";
    echo "<div class='flaticon-ville'>".$unit['ville']."</div>";
    echo "<div class='flaticon-calend'>Du ".date("d-m-Y", strtotime($unit['date_arrivee']))." au ".date("d-m-Y", strtotime($unit['date_depart']))."</div>";
    echo "<div class='flaticon-capa'>".$unit['capacite']." personnes</div>";
    echo "<div class='flaticon-euro'>".$unit['prix']." euros</div>";
    echo "</div>";
    echo "<div class='linksProdAdmin'>";
    echo "<a href='?controller=ProduitController&action=displayUpdateProduit&id=".$unit['id_produit']."' class='bouton'>Modifier</a>";
    echo "<a href='?controller=ProduitController&action=allowDelete&id=".$unit['id_produit']."' class='bouton'>Supprimer</a>";
    echo "</div>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";


