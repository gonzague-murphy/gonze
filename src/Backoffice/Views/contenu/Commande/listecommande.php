<?php
//var_dump($commandes);
//var_dump($detail);
$chiffreAffaire = 0;
function calculateCA($year){
    foreach($commandes as $key=>$value){
        $format = date("Y", strtotime($value->getDate()));
        if($format == $year){
            $chiffreAffaire += $value->getMontant();
        }
    }
    return "Notre chiffre d'affaire annuel s'élève à ".$chiffreAffaire." euros";
}
?>
<label>Chiffre d'affaire par an :</label>
<select name='annee'>
    
</select>
<div>
    <table>
        <th>
            <tr>
                <td>Id_commande</td>
                <td>Id_membre</td>
                <td>Montant</td>
            </tr>
        </th>
<?php
    foreach($commandes as $key=>$value){
        echo "<tr>";
        echo "<td>".$value->getIdCommande()."</td>";
        echo "<td>".$value->getIdMembre()."</td>";
        echo "<td>".$value->getMontant()."</td>";
        echo "</tr>";
        foreach($detail as $unit=>$data){
            foreach($data as $object=>$prop){
                if($value->getIdCommande() == $prop->id_commande){
                    echo "<tr class='blueRow'>";
                    echo "<td>".$prop->id_details_commande."</td>";
                    echo "<td>".$prop->id_commande."</td>";
                    echo "<td>".$prop->id_produit."</td>";
                    echo "</tr>";
                }
            }
        }
    }
?>
    </table>
</div>
