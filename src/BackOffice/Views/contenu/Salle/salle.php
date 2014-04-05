<!DOCTYPE html>
<div id='galerie'>
    <a href="?controller=SalleController&action=displaySalleFormAdd"><span>+</span>Ajouter une Salle</a>
    <ul class='produit'>
<?php
foreach($salles as $unit){
   //var_dump($_FILES);
   echo "<li>";
   echo "<h4>".$unit->getTitre()."</h4>";
   echo "<img src='/../".$unit->getPhoto()."'/>";
   echo "<a href='?controller=SalleController&action=deleteSalle&id=".$unit->getIdSalle()."' class='bouton'>Supprimer</a>";
   echo "<a href='?controller=SalleController&action=displaySalleForm&id=".$unit->getIdSalle()."' class='bouton'>Modifier</a>";
   echo "</li>";
    }
?>
    </ul>
</div> 
