<?php

use GuzzleHttp\Exception\GuzzleException;
use HttpGateway\App;
use HttpGateway\GatewayClient;

require_once "../vendor/autoload.php";

$app = new App("{appname}", "{destination}");

$httpGw = new GatewayClient("{baseurl}", "{password}");

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
} catch (GuzzleException $exception) {
    print $exception->getMessage();
}
