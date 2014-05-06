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
            <td>Salle</td>
            <td>Photo</td>
            <td>Date d'arrivée/Date de départ</td>
            <td>Capacité</td>
            <td>Prix</td>
            <td>TVA</td>
            <td>Retirer du panier</td>
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
</table>

<?php
    echo "Prix total : ".Component\PanierSessionHandler::calculateTotal()." euros";
    echo "<form method='post' action='?controller=CommandeController&action=dispatchOrder'>";
    echo "<label>Disposez-vous d'un code de réduction?</label><input type='text' name='promo' />";
    echo "<input type='submit' value='Passer ma commande'/>";
    echo "</form>";
}