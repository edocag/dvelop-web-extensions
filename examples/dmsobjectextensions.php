<?php

use Extensions\DmsObject\ActivationCondition;
use Extensions\DmsObject\Caption;
use Extensions\DmsObject\Context;
use Extensions\DmsObject\DmsObjectExtension;
use Extensions\DmsObject\DmsObjectExtensions;
use Extensions\Link;

require_once "../vendor/autoload.php";


$activationConditions = [
    new ActivationCondition(
        "repository.id",
        "or",
        [
            "3cd6e233-8ca1-5d1b-9b49-21e63b90db05"
        ]
    )
];

$captions = [
    new Caption(
        "de",
        "Sample extension"
    )
];

$extension = new DmsObjectExtension(
    "app.extensionid",
    $activationConditions,
    $captions,
    Context::$DmsObjectDetailsContextAction,
    "/edoc-sample-app/tester?docid={dmsobject.property_document_id}",
    "/edoc-sample-app/icon.jpg"
);

$extensions = new DmsObjectExtensions(
    [
        $extension
    ],
    new Link("/edoc-sample-app/dmsobjectextensions")
);


//Ouput json
header('Content-Type: application/hal+json');
echo json_encode($extensions, JSON_PRETTY_PRINT);
