<?php
//var_dump($membres);
echo "<div id='galerieMembre'>";
echo "<a href='?controller=MembreController&action=signUpForm'><span>+</span>Ajouter un Administrateur</a><br/>";
echo "<ul>";
foreach($membres as $user=>$unit){
    echo "<li><div>".$unit->getPseudo().' | '.$unit->getEmail().'</div><a href=?controller=MembreController&action=allowDelete&id='.$unit->getIdMembre().'><span id="suppr">x</span>Supprimer ce membre</a></li>';
}
echo "</ul>";
echo "</div>";

