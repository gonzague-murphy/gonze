<!DOCTYPE html>
<div id='galerie'>
    <a href="?controller=SalleController&action=displaySalleFormAdd" class='add'><span>+</span>Ajouter une Salle</a>
    <ul class='produit'>
<?php
foreach($salles as $unit){
   echo "<li>";
   echo "<div class='details'>";
   echo "<h4>".$unit->getTitre()."</h4>";
   echo "<img src='/../".$unit->getPhoto()."'/>";
   echo "</div>";
   echo "<div class='linksProdAdmin'>";
   echo "<a href='?controller=SalleController&action=displaySalleForm&id=".$unit->getIdSalle()."' class='bouton'>Modifier</a>";
   echo "<a href='?controller=SalleController&action=deleteSalle&id=".$unit->getIdSalle()."' class='bouton'>Supprimer</a>";
   echo "</div>";
   echo "</li>";
    }
?>
    </ul>
</div> 
