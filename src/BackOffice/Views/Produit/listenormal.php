<!DOCTYPE html>
   <table border="2">
   <!--<tr>
   <th colspan="3">Aperçu</th>
   <th>Supprimer</th>
   <th>Modifier</th>
   </tr>-->
    <tr>
<?php
//var_dump($liste);
echo "<a href='?controller=ProduitController&action=displayForm'>Ajouter un produit</a><br/>";
foreach($liste as $salle=>$unit){
     echo "<td border>";
    echo "<h4>".$unit['titre']."</h4>";
    echo "<a href='?modif=delete&id=".$unit['id_produit']."'>X---</a>";
    echo "<a href='index.php?controller=ProduitController&action=displayUpdateProduit&id=".$unit['id_produit']."'>Update</a>";
    echo "</td>";
  
}
?>
  </tr>
  </table>

