<?php
//var_dump($promo);
echo "<a href='?controller=PromotionController&action=addCodePromoForm' class='add'><span>+</span>Ajouter un code promo</a>";
echo "<table>";
echo "<tr>";
echo "<th>Code</th>";
echo "<th>Réduction</th>";
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
foreach($promo as $key=>$value){
    echo "<tr>";
    echo "<td>".$value->getCodePromo()."</td>";
    echo "<td>".$value->getReduction()." €</td>";
    echo "<td><a href='?controller=PromotionController&action=updateCodePromoForm&id=".$value->getIdPromo()."' class='add'> Modifier </a></td>";
    echo "<td><a href='?controller=PromotionController&action=deletePromo&id=".$value->getIdPromo()."' class='add'>X</a></td>";
    echo "</tr>";
}
echo "</table>";

