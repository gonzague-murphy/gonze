<?php
//var_dump($resume);
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
        </tr>
    </thead>
<?php
foreach($resume as $key=>$value){
    $dateArr = Backoffice\Controller\ProduitController::formatDateForDisplay($value['date_arrivee']);
    $dateDep = Backoffice\Controller\ProduitController::formatDateForDisplay($value['date_depart']);
    echo "<tr>";
    echo "<td>".$value['titre']."</td>";
    echo "<td><img src='".$value['photo']."' /></td>";
    echo "<td>Du ".$dateArr." au ".$dateDep."</td>";
    echo "<td>".$value['capacite']." pers.</td>";
    echo "<td>".$value['prix']." €</td>";
    echo "<td>20%</td>";
    echo "</tr>";
}
?>
</table>
   

<?php
echo "Réduction appliquée : ".$reduction." €<br/>";
echo "Prix total : ".Component\PanierSessionHandler::calculateTotal($reduction)." €<br/>";
echo "<form method='post' action='?controller=CommandeController&action=makeOrder'>";
echo "<input type='hidden' name='montant' value='".\Component\PanierSessionHandler::calculateTotal($reduction)."' />";
    //var_dump(Component\UserSessionHandler::getUser());
    echo "<input type='hidden' name='id_membre' value='".\Component\UserSessionHandler::getUser()->id_membre."' />";
    echo "<input type='submit' value='Commander' />";
    echo "</form>";