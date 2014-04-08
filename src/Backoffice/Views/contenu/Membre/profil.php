<?php
echo "<a href='?controller=MembreController&action=updateProfil'>Modifier mes infos?</a><br/>";
//var_dump($mesInfos);
echo $mesInfos->getPseudo()."<br/>";
echo $mesInfos->getEmail();

