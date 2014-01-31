<?php
//var_dump($produits);
echo "<a href='?controller=ProduitController&action=displayForm'>Ajouter un produit</a><br/>";
foreach($produits as $unit=>$value){
    echo $value->getIdProduit()."<br/>";
    //echo "<a href='?modif=delete&id=".$value->getIdProduit()."'>X---</a>";
   //echo "<a href='?controller=SalleController&action=displaySalleForm&modif=update&id=".$unit->getIdSalle()."'>Update</a>";
   //echo "<a href='?modif=update&id=".$value->getIdSalle()."'>Update</a>";-->
            
}

