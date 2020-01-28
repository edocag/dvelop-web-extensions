<?php

use IdentityProvider\SimpleIdpClient;

require_once "../vendor/autoload.php";

$idpClient = new SimpleIdpClient("https://d3one.edoc.de");

echo $idpClient->loginUrl("/home");

var_dump($idpClient->tokenExists());

var_dump($idpClient->validateToken());
