<?php //var_dump($liste); ?> 
    <!--<label>Trier Par ville :</label>
    <select class='town'>
        <option name='default' value=''>---</option>
        <option name='paris' value="paris">Paris</option>
        <option name='lyon' value="lyon">Lyon</option>
        <option name='bordeaux' value="bordeaux">Bordeaux</option>
    </select>-->
<?php
echo "<div id='galerie'>";
echo "<ul class='produit'>";
foreach($liste as $salle=>$unit){
    echo "<li>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'><img src='".$unit['photo']."'></a><br/>";
    echo "<a href='?controller=CommandeController&action=addToCart&id=".$unit['id_produit']."' class='bouton'>Ajouter au panier</a>";
    echo "</li>";
    }
echo "</ul>";
echo "</div>";
