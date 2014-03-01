<?php
//var_dump($cart);
echo "<ul>";
foreach($cart as $key=>$value){
    echo "<li>".$value['titre']." <a href=''>Enlever du panier</a></li>";
}
echo "</ul>";
echo "<input type='submit' value='Passer ma commande'/>";