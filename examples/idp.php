<?php
use IdentityProvider\IDPClient;

require_once "../vendor/autoload.php";

$idp = new IDPClient(
    "{basis-url}",
    "{token}");

//header("Location: ".$idp->loginUrl("/edoc-contract-app/"));

try {
    $data = $idp->validate(false);
    
    if ($data !== false) {
        //Login success
        var_dump($data);
    } else {
        //Login failed
        echo "Login failed";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}