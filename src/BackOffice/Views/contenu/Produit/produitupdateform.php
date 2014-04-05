<?php
//var_dump($liste[0]);
echo "<form method='post' action='?controller=ProduitController&action=lanceUpdate&id=".$_GET['id']."'>
";
echo '<label>Date d\'arrivée</label>';
echo '<input type="text" class="dateGen" name="date_arrivee" value="'.Backoffice\Controller\ProduitController::formatDateForDisplay($result['date_arrivee']).'"/>';
echo '<label>Date de départ</label>';
echo '<input type="text" class="dateGen" name="date_depart" value="'.Backoffice\Controller\ProduitController::formatDateForDisplay($result['date_depart']).'"/>';
echo '<label>Prix</label>';
echo '<input type="text" name="prix" value="'.$result['prix'].'"/>';
echo '<label>Salle (actuellement : '.$result['titre'].')</label>';
echo '<select name="salle">';
foreach($liste[0] as $key=>$value){
    //var_dump($unit);
   echo '<option value="'.$value->getIdSalle().'">'.$value->getTitre().'</option>';

}
echo "</select>";
echo '<label>Code promo (actuellement :'.$result['code_promo'].')</label>';
echo '<select name="promo">';
foreach($liste[1] as $key=>$unit){
    //var_dump($unit);
    echo '<option value="'.$unit->getIdPromo().'">'.$unit->getCodePromo().'</option>';
    
}
echo '</select>';
echo '<label>Etat de la salle</label>';
echo '<select name="etat">';
echo '<option value="0" selected="selected">Libre</option>';
echo '<option value="1">Reservée</option>';
echo '</select>';
echo '<input type="submit" id="submit" name="submit" value="submit" />';
?>
</form>
    


