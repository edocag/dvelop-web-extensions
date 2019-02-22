<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Edoc\Dvelop\Cloud\HttpGateway;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;



class Registration
{
    /** @var $baseUrl String */
    public $baseUrl;
    /** @var $user String  */
    private $user = "appsadmin";
    /** @var $password String  */
    public $password;
    /** @var $httpClient Client */
    private $httpClient;
    
    /**
     * HttpGatewayRegistration constructor.
     * @param String $baseUrl
     * @param String $password
     */
    public function __construct(String $baseUrl, String $password)
    {
        $this->baseUrl = $baseUrl;
        $this->password = $password;
        
        $this->httpClient = new Client([
            // Base URI is used with relative requests
            'base_uri' =>  $this->baseUrl,
            // You can set any number of default request options.
            'timeout'  => 3.0,
            //Check SSL Certificate
            "verify" => false
        ]);
    }
    
    
    /** Check successfull reaching and authentication to d.ecs http gateway
     * @return bool
     * @throws GuzzleException
     */
    public function checkConnection()
    {
        $response = $this->httpClient->request(
            "GET",
            "/httpgateway/conf/apps",
            [
                'http_errors' => false,
                'Accept'     => 'application/hal+json',
                'auth' => [$this->user, $this->password, "digest"]
            ]
        );
       return $response->getStatusCode() == 200;
    }
    
    /**
     * @param App $app
     * @return mixed
     * @throws GuzzleException
     */
    public function addRegistration(App $app)
    {

            $response = $this->httpClient->request(
                "POST",
                "/httpgateway/conf/apps",
                [
                    'http_errors' => false,
                    'Accept'     => 'application/hal+json',
                    'auth' => [$this->user, $this->password, "digest"],
                    'json' => $app
                ]
            );
            return $response->getHeader("Locaction")[0];
    }
    
    /**
     * @param String $appInstanceUri
     * @return string[]
     * @throws GuzzleException
     */
    public function removeRegistration(String $appInstanceUri)
    {
        $response = $this->httpClient->request(
            "DELETE",
            $appInstanceUri,
            [
                'http_errors' => false,
                'Accept'     => 'application/hal+json',
                'auth' => [$this->user, $this->password, "digest"],
            ]
        );
        return $response->getHeader("Locaction");
    }
}