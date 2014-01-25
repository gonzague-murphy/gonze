<?php

require_once(__DIR__ . '/../vendor/autoload.php');
USE Backoffice\Controller\MembreController;
session_start();

/*
 * Default Controller, on va appeler les pages concernées ici
 */
//var_dump($_GET);

/*
 * Au cas ou l'utilisateur veut se log
 */
$membre = new MembreController;
$membre->defaultDisplay();
//$session = Entity\mySession::getSession();
if(isset($_POST) && !empty($_POST)){
  $membre->loginUser($_POST);
}
//var_dump($membre);



//session_destroy();
