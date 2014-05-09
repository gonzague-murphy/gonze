<?php
//var_dump($membres);
echo "<div id='galerieMembre'>";
echo "<a href='?controller=MembreController&action=signUpFormAdmin' class='add'><span>+</span>Ajouter un Administrateur</a><br/><br/>";
echo "<table>";
echo "<tr>";
echo "<th>Pseudo</th>";
echo "<th>Email</th>";
echo "<th>Rôle</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
foreach($membres as $user=>$unit){
    echo "<tr>";
    echo "<td>".$unit->getPseudo().'</td>';
    echo "<td>".$unit->getEmail().'</td>';
    echo "<td>";
    if($unit->getStatut() == 1){
        echo "Administrateur";
    }
    else{
        echo "Membre";
    }
    echo "</td>";
    echo '<td><a href="?controller=MembreController&action=allowDelete&id='.$unit->getIdMembre().'" class="add">&nbsp;&nbsp;&nbsp;X</a></td>';
    echo "</tr>";
}
echo "</ul>";
echo "</div>";

