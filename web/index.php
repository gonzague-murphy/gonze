<?php
require_once(__DIR__ . '/../vendor/autoload.php');
USE Component\UserSessionHandler;
session_start();
UserSessionHandler::expireSession();
var_dump(time());

$page =  new Component\RoutingHandler();
