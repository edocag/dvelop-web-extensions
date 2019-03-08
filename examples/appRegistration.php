<?php

use GuzzleHttp\Exception\GuzzleException;
use HttpGateway\App;
use HttpGateway\Registration;

require_once "../vendor/autoload.php";
require_once "../autoload.php";

$app = new App("edoc-testapp", "https://s454.edoc.local/edoc-testapp");

$httpGw = new Registration("https://d3server.edoc.local", "e8b9376c70c9f877f2b0f3c205a01bb1c696defc9125b13d63633844ad8a9a81");

try {
    $httpGw->getRealRegistrationUrl();
    
    if ($httpGw->checkConnection()) {
        if ($location = $httpGw->addRegistration($app)) {
            print "successful registration";
    
            if ($httpGw->removeRegistrationFromApp($app)) {
                print "succesfully deleted registration $location";
            } else {
                print "registration deletion failed";
            }
            
            
            if ($httpGw->removeRegistrationFromUrl($location)) {
                print "succesfully deleted registration $location";
            } else {
                print "registration deletion failed";
            }
        } else {
            print "registration failed";
        }
    } else {
        print "no connection";
    }
} catch(GuzzleException $exception) {
    print $exception->getMessage();
}