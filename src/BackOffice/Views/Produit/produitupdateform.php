<?php
var_dump($salle->getTitre());
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form>
<label>Date d'arrivée</label>
<input type="text" name="date_arrivee" value="<?php echo $produit->getDateArrivee()?>"/>
<label>Date de départ</label>
<input type="text" name="date_depart" value="<?php echo $produit->getDateDepart()?>"/>
<label>Prix</label>
<input type="text" name="prix" value="<?php $produit->getPrix()?>"/>
<label>Salle (actuellement : <?php $salle->getTitre()?></label>
<select name="salle">
<option value="<?php $salle->getIdSalle()?>"><?php echo $salle->getTitre() ?></option>
</select>
<?php
/*
echo '<label>Code promo</label>';
echo '<select name="promo">';
foreach($promotion as $value){
    echo '<option value="'.$value->getIdPromo().'">'.$value->getCodePromo().'</option>';
}
echo '</select>';
echo '<label>Etat de la salle</label>';
echo '<select name="etat">';
echo '<option value="0" selected="selected">Libre</option>';
echo '<option value="1">Reservée</option>';
echo '</select>';
echo '<input type="submit" id="submit" name="submit" value="submit" />';
echo "</form>";*/
