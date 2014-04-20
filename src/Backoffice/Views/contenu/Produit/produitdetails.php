<div id="ficheProduit">
<h3><?php echo $liste['titre'] ?></h3>
<img src="<?php echo $liste['photo']; ?>" />
<p><?php echo $liste['description']; ?></p>
<p>Prix : <?php echo $liste['prix']; ?> €</p>
<h3>Avis :</h3>
<?php 
$user = \Component\UserSessionHandler::getUser();
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
    echo "<a href='?controller=MembreController&action=loginDisplay'>Vous devez etre connecté pour laisser un avis</a><br/>";
}
//var_dump($avis);
foreach($avis as $key=>$value){
    echo "<h4> Membre : ".$value['pseudo']."</h4>";
    echo "<p>Commentaire : ".$value['commentaire']."</p>";
    echo "<p>Note attribuée : ".$value['note']."/10</p>";
}
echo "<a href='?controller=CommandeController&action=addToCart&id=".$liste['id_produit']."'>Ajouter au panier</a>";
echo "</div>";