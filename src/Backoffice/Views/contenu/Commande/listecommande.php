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
    <!--<ul>
       <li>N° de la commande</li>
       <li>N° du client</li>
       <li>Montant</li>
    </ul>-->
<?php
    foreach($commandes as $key=>$value){
        echo "<ul>";
        echo "<li>N° de la commande : ".$value->getIdCommande()."</li>";
        echo "<li>N° du client : ".$value->getIdMembre()."</li>";
        echo "<li>Montant : ".$value->getMontant()." €</li>";
        echo "<li class='fullDetails'>+Details</li>";
        foreach($detail as $unit=>$data){
            foreach($data as $object=>$prop){
                if($value->getIdCommande() == $prop->id_commande){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>N° des détails de la commande</th>";
                    echo "<th>N° de la commande</th>";
                    echo "<th>N° du produit acheté</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$prop->id_details_commande."</td>";
                    echo "<td>".$prop->id_commande."</td>";
                    echo "<td>".$prop->id_produit."</td>";
                    echo "</tr>";
                    echo "</table>";
                }
            }
        }
    }
    echo "</ul>";
?>
</div>
