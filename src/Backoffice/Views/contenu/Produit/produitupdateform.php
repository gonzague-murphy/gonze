<?php
//var_dump($liste);

if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}

elseif(isset($msg) && !is_array($msg)){
    echo "<div class='error'>".$msg."</div>";
}
echo "<form method='post' action='?controller=ProduitController&action=lanceUpdate&id=".$_GET['id']."' class='siteForms'>
";
echo "<div class='modifyProduct'>";
echo "<h3>".$liste[0]->getTitre()."</h3>";
echo "<p>".$liste[0]->getVille()."</p>";
echo "<img src='".$liste[0]->getPhoto()."'/>";
echo "</div>";
echo "<input type='hidden' name='salle' value='".$liste[0]->getIdSalle()."' />";
echo '<label>Date d\'arrivée</label>';
echo '<input type="text" class="dateGen" name="date_arrivee" value="'.Backoffice\Controller\ProduitController::formatDateForDisplay($result['date_arrivee']).'"/>';
echo '<label>Date de départ</label>';
echo '<input type="text" class="dateGen" name="date_depart" value="'.Backoffice\Controller\ProduitController::formatDateForDisplay($result['date_depart']).'"/>';
echo '<label>Prix</label>';
echo '<input type="text" name="prix" value="'.$result['prix'].'"/>';
echo '<label>Code promo (actuellement : '.$result['code_promo'].')</label>';
echo '<select name="promo">';
foreach($liste[1] as $key=>$unit){
    //var_dump($unit);
    echo '<option value="'.$unit->getIdPromo().'">'.$unit->getCodePromo().'</option>';
    
}
echo '</select>';
echo '<label>Etat de la salle</label>';
echo '<select name="etat">';
echo '<option value="0">Libre</option>';
echo '<option value="1">Reservée</option>';
echo '</select>';
echo '<input type="submit" id="submit" name="submit" value="Modifier" />';
?>
</form>
    


