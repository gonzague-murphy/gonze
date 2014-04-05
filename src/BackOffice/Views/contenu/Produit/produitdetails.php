<div id="ficheProduit">
<h3><?php echo $liste['titre'] ?></h3>
<img src="<?php echo $liste['photo']; ?>" />
<p><?php echo $liste['description']; ?></p>
<p>Prix : <?php echo $liste['prix']; ?> €</p>
<h3>Avis :</h3>
<?php foreach($avis as $key=>$value){
    echo "<h4>".$value['pseudo']."</h4>";
    echo "<p>".$value['commentaire']."</p>";
    echo "<p>Note attribuée :".$value['note']."</p>";
}
$user = \Component\UserSessionHandler::getUser();
if(!empty($user)){
    echo "<a href=''>Laisser un avis sur cette Salle</a><br/>";
}
else{
    echo "Vous devez etre <a href=''>connecté</a> pour laisser un avis<br/>";
}
echo "<a href='?controller=CommandeController&action=addToCart&id=".$liste['id_produit']."'>Ajouter au panier</a>";
echo "</div>";