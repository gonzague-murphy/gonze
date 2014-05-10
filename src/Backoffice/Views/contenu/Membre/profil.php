<?php
echo "<div class='monProfil'>";
echo "<a href='?controller=MembreController&action=updateProfil' class='add'><span>+</span>Modifier mes infos?</a><br/>";
echo "Pseudo : ".$mesInfos->getPseudo()."<br/>";
echo "Email : ".$mesInfos->getEmail()."<br/>";
echo "Nom : ".ucfirst($mesInfos->nom)."<br/>";
echo "Prenom : ".ucfirst($mesInfos->prenom)."<br/>";
echo "Adresse : ".$mesInfos->adresse.", ".$mesInfos->cp." ".ucfirst($mesInfos->ville)."<br/>";
?>

<h5>Mes trois dernières commandes : </h5>
<table class='profil'>
    <tr>
        <th>N° de la commande</th>
        <th>Montant</th>
        <th>Date</th>
    </tr>
<?php
foreach($orders as $key=>$value){
    echo "<tr>";
    echo "<td>".$value['id_commande']."</td>";
    echo "<td>".$value['montant']." €</td>";
    echo "<td>".date("d-m-Y", strtotime($value['date']))."</td>";
    echo "</tr>";
}
?>
</table>
</div>

