<?php

echo "<h3>Top 5 des salles les mieux notées (en moyenne)</h3>";
//var_dump($bestRanked);
echo "<table>";
    echo "<th>";
    echo "<tr>";
    echo "<td>Salle</td>";
    echo "<td>Note moyenne</td>";
    echo "</tr>";
    echo "</th>";
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
    echo "<th>";
    echo "<tr>";
    echo "<td>Salle</td>";
    echo "<td>Commandée</td>";
    echo "</tr>";
    echo "</th>";
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
echo "<h3>Top 5 des membres qui achète le plus (en termes de quantité) :</h3>";
echo "<h3>Top 5 des membres qui achète le plus cher (en termes de prix) :</h3>";

