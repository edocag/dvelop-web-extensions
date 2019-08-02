<?php

namespace HttpGateway;

use Exceptions\GatewayException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\TransferStats;


class GatewayClient
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
    
    /** @var bool  */
    private $realRegistrationUrlGiven;

    /**
     * HttpGatewayRegistration constructor.
     * @param String $baseUrl
     * @param String $password
     * @param array $guzzleOptions
     */
    public function __construct(
        String $baseUrl,
        String $password,
        array $guzzleOptions = [
            // You can set any number of default request options.
            'timeout' => 3.0,
            //Check SSL Certificate
            "verify" => false
        ]
    )
    {
        
        $this->baseUrl = $baseUrl;

        $this->setPassword($password);

        // Base URI is used with relative requests
        str_replace("https://", "", $this->baseUrl);
        
        if (strpos($baseUrl, "https://") !== false) {
            $guzzleOptions["base_uri"] = $this->baseUrl;
        } else {
            $guzzleOptions["base_uri"] = "https://" . $this->baseUrl;
        }
        
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
     * Get real registration url on port 4200
     * @throws GatewayException
     */
    public function getRealRegistrationUrl()
    {
        try {
            $this->httpClient->request(
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
            $this->realRegistrationUrlGiven = true;
        } catch(GuzzleException $exception) {
            throw new GatewayException("Error getting real registration url",0,$exception);
        }
       
    }
    
    /** Add an new d.ecs http gateway app registration. One app name can have multiple instances
     * @param App $app
     * @return String d.ecs http gateway instance url
     * @throws GuzzleException
     * @throws GatewayException
     */
    public function addRegistration(App $app)
    {
        if (!$this->realRegistrationUrlGiven) {
            $this->getRealRegistrationUrl();
        }
        
        if (!$this->checkConnection()) {
            throw new GatewayException("Could not establish connection");
        }
        
        try {
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
                   throw new GatewayException("Got no app url / location header back from d.ecs http gateway");
                }
            } else {
                throw new GatewayException("Got no good response from d.ecs http gateway");
            }
        } catch(GuzzleException $exception) {
            throw new GatewayException("Error with Guzzle " . $exception->getMessage(),0,$exception);
        }
    }

    /** Delete app registration via App instance
     * @param App $app
     * @return bool Successful deletion
     * @throws GuzzleException
     */
    public function removeRegistrationFromApp(App $app)
    {
        $instanceUrl = $this->registrationUrl . "/" . $app->app . "/instances/" . $app->instanceId;
        $response = $this->httpClient->request(
            "DELETE",
            $instanceUrl,
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

    /** Delete app registration via URL of app instance
     * @param String $appInstanceUri
     * @return bool Successful deletion
     * @throws GuzzleException
     */
    public function removeRegistrationFromUrl(String $appInstanceUri)
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
