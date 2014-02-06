<?php
echo "<form method='post' action='?controller=ProduitController&action=lanceUpdate&id=".$_GET['id']."'>
";
echo '<label>Date d\'arrivée</label>';
echo '<input type="text" name="date_arrivee" value="'.$produit->getDateArrivee().'"/>';
echo '<label>Date de départ</label>';
echo '<input type="text" name="date_depart" value="'.$produit->getDateDepart().'"/>';
echo '<label>Prix</label>';
echo '<input type="text" name="prix" value="'.$produit->getPrix().'"/>';
echo '<label>Salle (actuellement : '.$salle->getTitre().')</label>';
echo '<select name="salle">';
foreach($allSalles as $unit){
    //var_dump($unit);
   echo '<option value="'.$unit->getIdSalle().'">'.$unit->getTitre().'</option>';

}
echo "</select>";
echo '<label>Code promo (actuellement :'.$promo->getCodePromo().')</label>';
echo '<select name="promo">';
foreach($allPromo as $value){
    echo '<option value="'.$value->getIdPromo().'">'.$value->getCodePromo().'</option>';
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
    


