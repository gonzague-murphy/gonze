<?php
//var_dump($membres);

foreach($membres as $user=>$unit){
    echo $unit->getPseudo().' | '.$unit->getEmail().'<a href=?controller=MembreController&action=allowDelete&id='.$unit->getIdMembre().'>X</a><br/>';
}

