<?php
//var_dump($promo);
echo "<a href='?controller=PromotionController&action=addCodePromoForm'>Ajouter un code promo</a>";
echo "<ul>";
foreach($promo as $key=>$value){
    echo "<li>".$value->getCodePromo()." | ".$value->getReduction()."<a href='?controller=PromotionController&action=deletePromo&id=".$value->getIdPromo()."'>--X--</a><a href='?controller=PromotionController&action=updateCodePromoForm&id=".$value->getIdPromo()."'>Update</a></li>";
}
echo "</ul>";

