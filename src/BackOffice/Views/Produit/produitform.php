<?php 
echo '<form method="post" action="?controller=ProduitController&action=lanceSaveProduct">
';
echo '<label>Salle</label>';
echo '<select name="salle">';
foreach($salles as $unit){
    //var_dump($unit);
   echo '<option value="'.$unit->getIdSalle().'">'.$unit->getTitre().'</option>';

}
echo "</select>";
echo '<label>Date d\'arrivée</label>';
echo '<input type="text" name="date_arrivee"/>';
echo '<label>Date de départ</label>';
echo '<input type="text" name="date_depart"/>';
echo '<label>Prix</label>';
echo '<input type="text" name="prix"/>';
echo '<label>Code promo</label>';
echo '<select name="promo">';
foreach($promotion as $value){
    echo '<option value="'.$value->getIdPromo().'">'.$value->getCodePromo().'</option>';
}
echo '</select>';
echo '<label>Etat de la salle</label>';
echo '<input type="text" name="etat"/>';
echo '<input type="submit" id="submit" name="submit" value="submit" />';
echo "</form>";
//var_dump($promotion);
    


