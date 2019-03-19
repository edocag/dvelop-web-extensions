<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

namespace IdentityProvider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;

class IDPClient
{
    /** @var $client Client */
    private $client;
    /** @var $baseUrl String */
    public $baseUrl;
    /** @var $authSessionId String */
    public $authSessionId;
    
    /**
     * IDPClient constructor.
     * @param String $baseUrl
     * @param String $authSessionId
     * @param array $guzzleOptions
     */
    public function __construct(String $baseUrl, String $authSessionId = "", array $guzzleOptions = ["verify => false"])
    {
        $this->baseUrl = $baseUrl;
        $this->authSessionId = $authSessionId;
        $this->client = new Client($guzzleOptions);
    }
    
    /** Get a login url for idp
     * @param String $redirect Path to redirect to after login
     * @return String URL
     */
    public function loginUrl(String $redirect)
    {
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/login");
        $uri = $uri->withQuery("redirect=".urlencode($redirect));
        
        return $uri->__toString();
    }
    
    /** Validate a token, return SCIM Object or false
     * @param bool $allowExternalValidation
     * @return array|bool
     * @throws \Exception
     */
    public function validate(bool $allowExternalValidation)
    {
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/validate");
        $uri = $uri->withQuery("allowExternalValidation=".(($allowExternalValidation) ? "true" : "false"));
    
        try {
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
                return false;
            }
    
            $jsonArray = json_decode($response->getBody()->getContents(),true);
            
            return $jsonArray;
            
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    
}