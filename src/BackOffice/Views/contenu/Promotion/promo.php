<?php
//var_dump($promo);
echo "<div id='galerie'>";
echo "<a href='?controller=PromotionController&action=addCodePromoForm'><span>+</span>Ajouter un code promo</a>";
echo "<ul>";
foreach($promo as $key=>$value){
    echo "<li>".$value->getCodePromo()." | ".$value->getReduction()."<a href='?controller=PromotionController&action=updateCodePromoForm&id=".$value->getIdPromo()."'> Modifier </a><a href='?controller=PromotionController&action=deletePromo&id=".$value->getIdPromo()."'>Supprimer</a></li>";
}
echo "</ul>";
echo "</div>";

