<?php
//var_dump($avis); 
?>
<div>
    <table>
            <tr>
                <th>Pseudo</th>
                <th>Salle</th>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Supprimer</th>
            </tr>
<?php 
            foreach($avis as $key=>$value){
                echo "<tr>";
                echo "<td>".$value->pseudo."</td>";
                echo "<td>".$value->titre."</td>";
                echo "<td>".$value->getNote()."</td>";
                echo "<td>".$value->getCommentaire()."</td>";
                echo "<td>".$value->getDate()."</td>";
                echo "<td><a href='?controller=AvisController&action=flushAdmin&id=".$value->getIdAvis()."' class='add'>X</a></td>";
                echo "</tr>";
            }
?>
    </table>
</div>

