<?php

namespace HttpGateway;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\TransferStats;


class Registration
{
    /** @var $baseUrl String */
    public $baseUrl;
    /** @var $registrationUrl String */
    public $registrationUrl;
    /** @var $user String */
    private $user = "appsadmin";
    /** @var $password String */
    private $password;
    /** @var $httpClient Client */
    private $httpClient;
    
    /**
     * HttpGatewayRegistration constructor.
     * @param String $baseUrl
     * @param String $password
     * @param array $guzzleOptions
     */
    public function __construct(String $baseUrl, String $password, $guzzleOptions = [// You can set any number of default request options.
        'timeout' => 3.0,
        //Check SSL Certificate
        "verify" => false])
    {
        $this->baseUrl = $baseUrl;
        
        $this->setPassword($password);
    
        // Base URI is used with relative requests
        $guzzleOptions["base_uri"] = $this->baseUrl;
        
        $this->httpClient = new Client($guzzleOptions);
    }
    
    /** Set new password (hash etc.)
     * @param String $password
     */
    public function setPassword(String $password)
    {
        $this->password = hash('sha256', $this->user . ":HttpGateway:" . $password);
    }
    
    
    /** Check successfull reaching and authentication to d.ecs http gateway
     * @return bool
     * @throws GuzzleException
     */
    public function checkConnection()
    {
        $response = $this->httpClient->request(
            "GET",
            $this->registrationUrl,
            [
                'http_errors' => false,
                'Accept' => 'application/hal+json',
                'auth' => [$this->user, $this->password, "digest"]
            ]
        );
        // echo $response->getBody()->getContents();
        return $response->getStatusCode() == 200;
    }
    
    
    /**
     * @throws GuzzleException
     */
    public function getRealRegistrationUrl()
    {
        $lookupResponse = $this->httpClient->request(
            "GET",
            "/httpgateway",
            [
                'http_errors' => false,
                'Accept' => 'application/hal+json',
                'on_stats' => function (TransferStats $stats) use (&$url) {
                    /** @var Uri $url */
                    $url = $stats->getEffectiveUri();
                }
            ]
        );
        
        $this->registrationUrl = $url->__toString() . "conf/apps";
    }
    
    /** Add an new d.ecs http gateway app registration. One app name can have multiple instances
     * @param App $app
     * @return String d.ecs http gateway instance url
     * @throws GuzzleException
     */
    public function addRegistration(App $app)
    {
        // echo "add registration to  $this->registrationUrl<br>";
        $response = $this->httpClient->request(
            "POST",
            $this->registrationUrl,
            [
                'http_errors' => false,
                'Accept' => 'application/hal+json',
                'auth' => [$this->user, $this->password, "digest"],
                'json' => $app,
            ]
        );
        
        if ($response->getStatusCode() == 201 && $response->hasHeader("Location")) {
            //print_r($response->getHeaders());
            $location = $response->getHeader("Location");
            //print_r($location);
            if (count($location) == 1) {
                return $response->getHeader("Location")[0];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * @param String $appInstanceUri
     * @return true
     * @throws GuzzleException
     */
    public function removeRegistration(String $appInstanceUri)
    {
        $response = $this->httpClient->request(
            "DELETE",
            $appInstanceUri,
            [
                'http_errors' => false,
                'Accept' => 'application/hal+json',
                'auth' => [$this->user, $this->password, "digest"],
            ]
        );
        
        if ($response->getStatusCode() == 200) {
            return true;
        } else {
            return false;
        }
    }
}