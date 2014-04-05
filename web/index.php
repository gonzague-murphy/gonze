<?php
require_once(__DIR__ . '/../vendor/autoload.php');
session_start();

//var_dump(explode('/', date('d/m/Y')));
$page =  new Component\RoutingHandler();
