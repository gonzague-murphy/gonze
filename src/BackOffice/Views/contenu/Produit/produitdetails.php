<h3><?php echo $liste['titre'] ?></h3>
<img src="<?php $liste['photo']; ?>" />
<p><?php echo $liste['description']; ?></p>
<p>Prix : <?php echo $liste['prix']; ?> €</p>
<h3>Avis :</h3>
<?php foreach($avis as $key=>$value){
    echo "<h4>".$value['pseudo']."</h4>";
    echo "<p>".$value['commentaire']."</p>";
    echo "<p>Note attribuée :".$value['note']."</p>";
}
echo "<a href='?controller=ProduitController&action=addToCart&id=".$liste['id_produit']."'>Ajouter au panier</a>";
//