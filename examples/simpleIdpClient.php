<?php

use IdentityProvider\SimpleIdpClient;

require_once "../vendor/autoload.php";
require_once "loggerImplementation.php";

$idpClient = new SimpleIdpClient("https://d3one.edoc.de", $logger);

echo $idpClient->loginUrl("/home");

$logger->debug("Token exists",[$idpClient->tokenExists()]);

$logger->debug("Token validation",[$idpClient->validateToken()]);
