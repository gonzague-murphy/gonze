<?php
//var_dump($cart);
if(empty($cart)){
    echo "Votre panier est vide!";
}
else{
    echo "<ul id='cart'>";
    foreach($cart as $key=>$value){
        echo "<li>".$value['titre']." <a href='?controller=CommandeController&action=removeFromCart&id=".$key."' class='bouton'>Enlever du panier</a></li>";
       }
    echo "</ul>";
    echo "<form method='post' action='?controller=CommandeController&action=makeOrder'>";
    echo "<input type='submit' value='Passer ma commande'/>";
    echo "<input type='hidden' name='montant' value='".\Component\PanierSessionHandler::calculateTotal()."' />";
    //var_dump(Component\UserSessionHandler::getUser());
    echo "<input type='hidden' name='id_membre' value='".\Component\UserSessionHandler::getUser()->id_membre."' />";
    
    echo "</form>";
    
    echo "Prix total : ".Component\PanierSessionHandler::calculateTotal()." euros";
}