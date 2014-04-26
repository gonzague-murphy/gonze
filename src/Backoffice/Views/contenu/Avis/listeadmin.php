<?php
//var_dump($avis); 
?>
<div>
    <table>
        <th>
            <tr>
                <td>Pseudo</td>
                <td>Salle</td>
                <td>Note</td>
                <td>Commentaire</td>
                <td>Date</td>
                <td>Supprimer</td>
            </tr>
        </th>
<?php 
            foreach($avis as $key=>$value){
                echo "<tr>";
                echo "<td>".$value->pseudo."</td>";
                echo "<td>".$value->titre."</td>";
                echo "<td>".$value->getNote()."</td>";
                echo "<td>".$value->getCommentaire()."</td>";
                echo "<td>".$value->getDate()."</td>";
                echo "<td><a href='?controller=AvisController&action=flushAdmin&id=".$value->getIdAvis()."'>X</a></td>";
                echo "</tr>";
            }
?>
    </table>
</div>

