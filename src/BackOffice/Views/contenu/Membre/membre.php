<?php
//var_dump($membres);
echo "<a href='?controller=MembreController&action=signUpForm'>Ajouter un Administrateur</a><br/>";
foreach($membres as $user=>$unit){
    echo $unit->getPseudo().' | '.$unit->getEmail().'<a href=?controller=MembreController&action=allowDelete&id='.$unit->getIdMembre().'>X</a><br/>';
}

