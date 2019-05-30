<?php

use IdentityProvider\IDPClient;
use IdentityProvider\SCIM\User;

require_once "../vendor/autoload.php";

$idp = new IDPClient(
    "{baseUrl}",
    "{token}");

//header("Location: ".$idp->loginUrl("/edoc-contract-app/"));

try {
    /** @var User $user */
    $user = $idp->validate(false);

    if ($user !== false) {
        echo $user->getId();
        echo $user->getDisplayName();
    } else {
        //Login failed
        echo "Login failed";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
