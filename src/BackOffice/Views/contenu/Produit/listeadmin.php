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
     echo "<td>";
    echo "<h4><a href='?controller=ProduitController&action=displayProductDetail&id=".$unit['id_produit']."'>".$unit['titre']."</a></h4>";
    echo "<a href='?controller=ProduitController&action=allowDelete&id=".$unit['id_produit']."'>X---</a>";
    echo "<a href='?controller=ProduitController&action=displayUpdateProduit&id=".$unit['id_produit']."'>Update</a>";
    echo "</td>";
  
}
?>
  </tr>
  </table>

