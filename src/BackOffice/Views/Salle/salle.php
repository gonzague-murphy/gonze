<!DOCTYPE html>
   <table>
   <!--<tr>
   <th colspan="3">Aperçu</th>
   <th>Supprimer</th>
   <th>Modifier</th>
   </tr>-->
    <tr>
   
<?php
foreach($salles as $unit){
   echo "<td>";
   echo "<h4>".$unit->getTitre()."</h4>";
   echo "<img src='/../".$unit->getPhoto()."'/>";
   echo "<a href='?modif=delete&id=".$unit->getIdSalle()."'>X---</a>";
   echo "<a href='?modif=update&id=".$unit->getIdSalle()."'>Update</a>";
   echo "</td>";
    }
?>
    </tr>
  </table>