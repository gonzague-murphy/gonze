<h4>Résultats de la recherche</h4>
<div id='galerie'>
<ul class='produit'>
<?php
var_dump($vars);
foreach($produit as $key=>$value){
    if(!empty($key)){
        foreach($value as $unit=>$data){
            echo "<li>";
            echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$data->id_produit."'>".$data->titre."</a></h4>";
            echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$data->id_produit."'><img src='".$data->photo."'></a><br/>";
            echo "<a href='?controller=CommandeController&action=addToCart&id=".$data->id_produit."' class='bouton'>Ajouter au panier</a>";
            echo "</li>";
        }
    }
}
?>
</ul>
</div>