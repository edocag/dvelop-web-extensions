<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

require_once "../vendor/autoload.php";
require_once "../autoload.php";

$idp = new \IdentityProvider\IDPClient(
    "https://d3server.edoc.local",
    "ELN1l79gPokb6VSIiqb%2bOwUPt7BIFXBqWf8jDEUPySfRcVvLIuDey8a5JWkpddBnoC31Fwe57BY0RqL0eHq4HfE7B8nfcz7129dL0aifgs4%3d%26puCiZtLN1AEjzK6Mi4kLf53Ue2GSdYpeQ0TouE4LFBXLw3cdZZCRl3qDj1XDgZGYlGiROaCTtJG8CRO4hxQLuGKY68_vJHbA");


$idp->validate(false);