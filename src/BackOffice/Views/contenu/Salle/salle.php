<!DOCTYPE html>
<a href="?controller=SalleController&action=displaySalleFormAdd">Ajouter une Salle</a>
   <table>
   <!--<tr>
   <th colspan="3">Aperçu</th>
   <th>Supprimer</th>
   <th>Modifier</th>
   </tr>-->
    <tr>
   
<?php
foreach($salles as $unit){
   //var_dump($_FILES);
   echo "<td>";
   echo "<h4>".$unit->getTitre()."</h4>";
   echo "<img src='/../".$unit->getPhoto()."'/>";
   echo "<a href='?controller=SalleController&action=deleteSalle&id=".$unit->getIdSalle()."'>X---</a>";
   //echo "<a href='?controller=SalleController&action=displaySalleForm&modif=update&id=".$unit->getIdSalle()."'>Update</a>";
   echo "<a href='index.php?controller=SalleController&action=displaySalleForm&id=".$unit->getIdSalle()."'>Update</a>";
   echo "</td>";
    }
?>
    </tr>
  </table>
