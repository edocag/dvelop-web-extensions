<?php
require 'vendor/autoload.php';

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class appPlugin_auth
{
    function validateLogin()
    {
        $logger = new Logger("logger");
        $logger->pushHandler(new StreamHandler(__DIR__ . '/my_app.log', Logger::DEBUG));
        $idpClient = new IdentityProvider\SimpleIdpClient("https://<server>", $logger);
        $return = $idpClient->validateToken(true);
        
        if ($return) {
            $_SESSION["displayName"] = $return["displayName"];
            $_SESSION["userName"] = $return["userName"];
            return 'Y';
        } else {
            $url = $_SERVER['REQUEST_URI'];
            return $idpClient->loginUrl($url);
        }
    }
}
