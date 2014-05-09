<?php
echo "<a href='?controller=MembreController&action=updateProfil'>Modifier mes infos?</a><br/>";
var_dump($mesInfos);
echo "Pseudo : ".$mesInfos->getPseudo()."<br/>";
echo "Email : ".$mesInfos->getEmail()."<br/>";
echo "Nom : ".ucfirst($mesInfos->nom)."<br/>";
echo "Prenom : ".ucfirst($mesInfos->prenom)."<br/>";
echo "Adresse : ".$mesInfos->adresse.", ".$mesInfos->cp." ".ucfirst($mesInfos->ville)."<br/>";

