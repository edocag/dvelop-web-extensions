<?php
require_once "../vendor/autoload.php";

use Extensions\Source\Source;
use Extensions\Source\SourceCategory;
use Extensions\Source\SourceProperty;

// Define Properties
$sourceProperties = [];

//For example purposes only one property
$contractIdProp = new SourceProperty("contractId", "Vertragsnummer");
$sourceProperties[] = $contractIdProp;

//Define categories
$sourceCategories = [];

//For example purposes only one category
$contractCategory = new SourceCategory("contract", "Vertrag");
$sourceCategories[] = $contractCategory;

//Create source
$source = new Source("eca", "edoc contract app", $sourceCategories, $sourceProperties);

//Add source to source pool for this app
$sources = new \Extensions\Source\Sources();
$sources->add($source);

//Ouput json
header('Content-Type: application/hal+json');
echo json_encode($sources, JSON_PRETTY_PRINT);