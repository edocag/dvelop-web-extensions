<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

namespace IdentityProvider;


use ArrayObject;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\UriTemplate;
use IdentityProvider\SCIM\User;
use IdentityProvider\SCIM\Group;

class IDPClient
{
    /** @var $client Client */
    private $client;
    /** @var $baseUrl String */
    private $baseUrl;
    /** @var $authSessionId String */
    private $authSessionId;
    
    /**
     * IDPClient constructor.
     * @param String $baseUrl
     * @param String $authSessionId
     */
    public function __construct(String $baseUrl, String $authSessionId)
    {
        $this->baseUrl = $baseUrl;
        $this->authSessionId = $authSessionId;
        $this->client = new Client(
            [
                "verify" => false
            ]
        );
    }
    
    public function validate(bool $allowExternalValidation)
    {
        $uri = new Uri($this->baseUrl);
       // echo $uri->__toString();
        $uri = $uri->withPath("identityprovider");
      //  echo $uri->__toString();
        $uri = $uri->withPath($uri->getPath() . "/validate");
        //echo $uri->__toString();
        $uri = $uri->withQuery("allowExternalValidation=".(($allowExternalValidation) ? "true" : "false"));
        //echo $uri->__toString();
       
        $response = $this->client->request(
            "GET",
            $uri,
            [
                "headers" => [
                    "Authorization" => "Bearer " . urldecode($this->authSessionId),
                    "Accept" => "application/json"
                ]
            ]
        );
        
        if ($response->getStatusCode() == 401) {
            return null;
        }
        //print_r($response->getBody()->getContents());
        
        $jsonArray = json_decode($response->getBody()->getContents(),false);
       // print_r($jsonArray);
        $mapper = new \JsonMapper();
        $array = [];
        $mapperArray = $mapper->map($jsonArray,new User());
        print_r($mapperArray);
        return ;
    }
    
    
}