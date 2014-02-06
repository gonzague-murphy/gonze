<?php
//var_dump($membres);

foreach($membres as $user=>$unit){
    echo $unit->getPseudo().' | '.$unit->getEmail().'<br/>';
}

