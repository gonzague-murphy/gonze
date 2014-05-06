<?php
echo "<div id='stats'>";
echo "<h3>Top 5 des salles les mieux notées (en moyenne)</h3>";
//var_dump($bestRanked);
echo "<table>";
    echo "<tr>";
    echo "<th>Salle</th>";
    echo "<th>Note moyenne</th>";
    echo "</tr>";
if(!is_null($bestRanked)){
    foreach($bestRanked as $key=>$value){
        echo "<tr>";
        echo "<td>".$value->titre."</td>";
        echo "<td>".$value->getNote()."/10 sur ".$value->nbre." avis</td>";
        echo "</tr>";
    }
}
else{
    echo "<h3>Désolée, aucune salle à afficher !</h3>";
}
echo"</table>";
echo "<h3>Top 5 des salles les plus vendues </h3>";
//var_dump($mostSold);
echo "<table>";
    echo "<tr>";
    echo "<th>Salle</th>";
    echo "<th>Commandée</th>";
    echo "</tr>";
if(!is_null($mostSold)){
    foreach($mostSold as $key=>$value){
        echo "<tr>";
        echo "<td>".$value['titre']."</td>";
        echo "<td>".$value['compte']." fois</td>";
        echo "</tr>";
    }
}
else{
    echo "<h3>Désolée, aucune salle à afficher !</h3>";
}
echo"</table>";
echo "<h3>Top 5 des membres qui achètent le plus (en termes de quantité) </h3>";
//var_dump($mostQty);
echo "<table>";
    echo "<tr>";
    echo "<th>Membre</th>";
    echo "<th>Nombre de produits commandés</th>";
    echo "</tr>";
if(!is_null($mostQty)){
    foreach($mostQty as $key=>$value){
        echo "<tr>";
        echo "<td>".$value['pseudo']."</td>";
        echo "<td>".$value['compte']."</td>";
        echo "</tr>";
    }
}
else{
    echo "<h3>Désolée, aucune salle à afficher !</h3>";
}
echo "</table>";
echo "<h3>Top 5 des membres qui achètent le plus cher (en termes de prix) </h3>";
//var_dump($mostExp);
echo "<table>";
    echo "<tr>";
    echo "<th>Membre</th>";
    echo "<th>A dépensé</th>";
    echo "</tr>";
if(!is_null($mostExp)){
    foreach($mostExp as $key=>$value){
        echo "<tr>";
        echo "<td>".$value['pseudo']."</td>";
        echo "<td>".$value['compte']." €</td>";
        echo "</tr>";    }
}
else{
    echo "<h3>Désolée, aucune salle à afficher !</h3>";
}
echo "</table>";
echo "</div>";
