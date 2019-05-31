<?php

namespace IdentityProvider;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use IdentityProvider\SCIM\User;
use JsonMapper;

class IDPClient
{
    /** @var $baseUrl String */
    public $baseUrl;
    /** @var $authSessionId string */
    public $authSessionId;
    /** @var $client Client */
    private $client;

    /**
     * IDPClient constructor.
     * @param string $baseUrl
     * @param string $authSessionId
     * @param array $guzzleOptions
     */
    public function __construct(string $baseUrl, string $authSessionId = "", array $guzzleOptions = ["verify => false"])
    {
        $this->baseUrl = $baseUrl;
        $this->authSessionId = $authSessionId;
        $this->client = new Client($guzzleOptions);
    }

    /** Get a login url for idp
     * @param String $redirect Path to redirect to after login
     * @return String URL
     */
    public function loginUrl(string $redirect)
    {
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/login");
        $uri = $uri->withQuery("redirect=" . urlencode($redirect));

        return $uri->__toString();
    }

    /** Validate a token, return SCIM Object or false
     * @param bool $allowExternalValidation
     * @return bool|User
     * @throws Exception
     */
    public function validate(bool $allowExternalValidation)
    {
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/validate");
        $uri = $uri->withQuery("allowExternalValidation=" . (($allowExternalValidation) ? "true" : "false"));

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

            $jsonArray = json_decode($response->getBody()->getContents(), false);
            $mapper = new JsonMapper();
            /** @var User $user */
            $user = $mapper->map($jsonArray, new User());

            return $user;

        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
