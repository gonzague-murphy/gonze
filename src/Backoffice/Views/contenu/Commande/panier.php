<?php
//var_dump($cart);
if(empty($cart)){
    echo "Votre panier est vide!";
}
else{
    if(isset($_GET['msg']) && $_GET['msg'] == 'on'){
        echo "Ce produit est déjà dans votre panier!<br/>";
    }
?>
<table class='commande'>
    <thead>
        <tr>
            <th>Salle</th>
            <th>Photo</th>
            <th>Date d'arrivée/Date de départ</th>
            <th>Capacité</th>
            <th>Prix</th>
            <th>TVA</th>
            <th>Retirer du panier</th>
        </tr>
    </thead>
<?php
foreach($cart as $key=>$value){
    $dateArr = Backoffice\Controller\ProduitController::formatDateForDisplay($value['date_arrivee']);
    $dateDep = Backoffice\Controller\ProduitController::formatDateForDisplay($value['date_depart']);
    echo "<tr>";
    echo "<td>".$value['titre']."</td>";
    echo "<td><img src='".$value['photo']."' /></td>";
    echo "<td>Du ".$dateArr." au ".$dateDep."</td>";
    echo "<td>".$value['capacite']." pers.</td>";
    echo "<td>".$value['prix']." €</td>";
    echo "<td>20%</td>";
    echo "<td><a href='?controller=CommandeController&action=removeFromCart&id=".$key."' class='bouton'>Enlever du panier</a></li></td>";
    echo "</tr>";
}
?>
</table><br/><br/>

<?php
    echo "Prix total : ".Component\PanierSessionHandler::calculateTotal()." euros<br/><br/>";
    echo "<form method='post' action='?controller=CommandeController&action=dispatchOrder' class='onCart'>";
    echo "<label>Disposez-vous d'un code de réduction?</label>";
    echo "<input type='text' name='promo' /><br/>";
    echo "<input type='submit' value='Passer ma commande' class='order'/>";
    echo "</form>";
}