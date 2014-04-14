<form method="post" action="?controller=ProduitController&action=lanceSaveProduct">
<?php echo "<div class='error'>".$msg."</div>"; ?>
<label>Date d'arrivée </label>
<input type="text" class="dateGen" name="date_arrivee" value="<?php if(isset($_POST['date_arrivee'])) echo $_POST['date_arrivee'];?>"/>
<label>Date de départ</label>
<input type="text" class="dateGen" name="date_depart" value="<?php if(isset($_POST['date_depart'])) echo $_POST['date_depart'];?>"/>
<label>Prix</label>
<input type="text" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix'];?>"/>
<label>Salle</label>
<select name="salle">
<?php
foreach($salles as $unit){
    //var_dump($unit);
   echo '<option value="'.$unit->getIdSalle().'">'.$unit->getTitre().'</option>';

}
?>
</select>
<label>Code promo</label>
<select name="promo">
<?php
foreach($promotion as $value){
    echo '<option value="'.$value->getIdPromo().'">'.$value->getCodePromo().'</option>';
}
?>
</select>
<label>Etat de la salle</label>
<select name="etat">
    <option value="0" selected="selected">Libre</option>
    <option value="1">Reservée</option>
</select>
<input type="submit" id="submit" name="submit" value="submit" />
</form>
    


