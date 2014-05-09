<?php
$user = \Component\UserSessionHandler::getUser();
?>
<div id="ficheProduit">
    <?php //var_dump($liste);?>
    <h3><?php echo $liste['titre'] ?></h3>
<img src="<?php echo $liste['photo']; ?>" />

    <div class='details'>
    <div class='flaticon-ville'><?php echo $liste['ville'];?></div>
    <div class='flaticon-calend'>Du <?php echo date("d-m-Y", strtotime($liste['date_arrivee']));?> au <?php echo date("d-m-Y", strtotime($liste['date_depart']));?></div>
    <div class='flaticon-capa'><?php echo $liste['capacite'];?> personnes</div>
    <div class='flaticon-euro'><?php echo $liste['prix'];?> euros</div>
    </div><br/>
<?php
if(!empty($user)){
    echo "<a href='?controller=CommandeController&action=addToCart&id=".$liste['id_produit']."' class='order'>+Ajouter au panier</a>";
}

else{
    echo "<span><a href='?controller=MembreController&action=loginDisplay' class='flyLogin add'>&#10095; Connectez-vous pour l'ajouter au panier</a></span>";
}

?>
   <input type="hidden" id="address" value="<?php echo $liste['adresse'].", ".$liste['cp']." ".$liste['ville'] ?>">
<ul class="tabs">
    <li><a href="#tab2">Description</a></li>
    <li><a href="#tab3">Avis</a></li>
</ul>
<div id="tab2" class="onglet">
<?php echo html_entity_decode($liste['description']);?>
</div>
<div id="tab3" class="onglet">
<?php 
//var_dump($user);
if(isset($user)){
    $avisCont = new Backoffice\Controller\AvisController;
    $doubleFeedback = $avisCont->checkFeedbackLeft($user->id_membre, $liste['id_salle']);
    //var_dump($doubleFeedback);
    if($doubleFeedback == false){
        echo "<form method='post' action='?controller=AvisController&action=addFeedbk&id=".$_GET['id']."'>";
        echo "<input type='hidden' name='id_membre' value='".$user->id_membre."'/>";
        echo "<input type='hidden' name='id_salle' value='".$liste['id_salle']."'/>";
        echo "<label>Note attribuée : (sur 10)</label>";
        echo '<select name="note" id="note">';
        $i =1;
        while($i<11){
            echo "<option value='".$i."'>".$i."</option>";
            $i++;
        }
        echo "</select>";
        echo "<label>Commentaire :</label>";
        echo "<textarea name='commentaire'></textarea>";
        echo '<input type="submit" value="Envoyer" />';
        echo "</form>";
       }
    else{
        echo $doubleFeedback;
        }
    }
//var_dump($avis);
if(empty($user)){
    echo "<a href='?controller=MembreController&action=loginDisplay' class='add'>Vous devez etre connecté pour laisser un avis</a><br/>";
}
//var_dump($avis);
foreach($avis as $key=>$value){
    echo "<h4> Membre : ".$value['pseudo']."</h4>";
    echo "<p>Commentaire : ".$value['commentaire']."</p><br/>";
    echo "<p>Note attribuée : ".$value['note']."/10</p>";
}
?>
</div>
<h4>Plan : </h4>
<div id="map-canvas"></div>
</div>
<div id='similar'>
    <h3>Suggestions similaires :</h3>
<?php
//var_dump($liste);
echo "<div id='galerie'>";
echo "<ul class='produit'>";
foreach($sim as $salle=>$unit){
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
?>
</div>