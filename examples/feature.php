<?php

use Extensions\Feature\Feature;
use Extensions\Feature\Features;
use Extensions\Link;

require_once "../vendor/autoload.php";

$sampleFeature = new Feature(
  "Cool Feature",
    "Cool subtitle",
    "Cool description",
    "Cool summary",
    "/edoc-feature-test/cool-feature",
    "#fff",
    "dv-zoomin"
);


$features = new Features(
    [
        $sampleFeature
    ],
    new Link("/edoc-feature-test/features")
);

//Ouput json
header('Content-Type: application/hal+json');
echo json_encode($features, JSON_PRETTY_PRINT);
