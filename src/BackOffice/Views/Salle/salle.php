<?php

foreach($salles as $unit){
   echo "<table border = 4>";
   echo "<tr>";
   echo "<td>".$unit->getTitre()."</td>";
   echo "<td><a href='?modif=delete&id=".$unit->getIdSalle()."'>X---</a></td>";
   echo "<td><a href='?modif=update&id=".$unit->getIdSalle()."'>Update</a></td>";
   echo "</tr>";
   echo "</table>";
   
}  

