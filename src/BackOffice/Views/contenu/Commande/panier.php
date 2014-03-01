<?php
//var_dump($cart);
if(empty($cart)){
    echo "Votre panier est vide!";
}
else{
    $i = 0;
    echo "<ul>";
    foreach($cart as $key=>$value){
        echo "<li>".$value['titre']." <a href='?controller=CommandeController&action=unsetItem&id=".$i."'>Enlever du panier</a></li>";
        $i++;
       }
    echo "</ul>";
    echo "<form method='post' action='?controller=CommandeController&action=makeOrder'>";
    echo "<input type='submit' value='Passer ma commande'/>";
    echo "</form>";
}