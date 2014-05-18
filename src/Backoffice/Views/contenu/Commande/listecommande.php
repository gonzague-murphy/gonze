<label>Chiffre d'affaire par an :</label>
<select name='annee' id='annee'>
<?php 
foreach($years as $key=>$value){
    foreach($value as $unit=>$data){
        echo "<option value='".$data."'>".$data."</option>";
    }
}
?>
</select>
<p class='result'></p>
<div>
    <!--<ul>
       <li>N° de la commande</li>
       <li>N° du client</li>
       <li>Montant</li>
    </ul>-->
<?php
/*var_dump($detail);
var_dump($commandes);*/
$i =0;
    foreach($commandes as $key=>$value){
        echo "<ul class='commandeAdmin'>";
        echo "<li>N° de la commande : ".$value->getIdCommande()."   </li>";
        if(!is_null($value->getIdMembre())){
            echo "<li>N° du client : ".$value->getIdMembre()."    </li>";
        }
        else{
            echo "<li>N° du client : Membre supprimé    </li>";
        }
        echo "<li>Montant : ".$value->getMontant()." €    </li>";
        
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
                    if(!is_null($prop->id_produit)){
                        echo "<td>".$prop->id_produit."</td>";
                    }
                    else{
                        echo "<td>Ce produit a été supprimé</td>";
                    }
                    echo "</tr>";
                    echo "</table>";
                }
            }
        }
       echo "</ul>";
    }
?>
</div>
