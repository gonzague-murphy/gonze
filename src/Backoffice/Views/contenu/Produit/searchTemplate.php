<?php
echo "<h4>Résultats de la recherche pour  le mois de ".getMonth($vars['mois'])." ".$vars['annee']." à ".ucfirst($vars['motCle'])." :</h4>";
echo "<div id='galerie'>";
echo "<ul class='produit'>";
//var_dump($vars);
function getMonth($inteGer){
    $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre","Novembre", "Décembre");
    foreach($mois as $key=>$value){
        if($inteGer == ($key+1)){
            return $value;
        }
    }
}
if(!empty($produit)){
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
}

else{
    echo "<div class='notFound'>Désolé, aucun résultat sur ces critères!</div>";
}
?>
</ul>
</div>