<?php


namespace IdentityProvider;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Psr\Log\LoggerInterface;

class SimpleIdpClient
{
    /** @var Client */
    private $httpClient;
    /** @var string */
    private $baseUrl;
    /** @var LoggerInterface  */
    private $logger;
    
    /**
     * SimpleIdpClient constructor.
     * @param string $baseUrl BaseUrl of the d.ecs http gateway instance
     * @param LoggerInterface $logger
     */
    public function __construct(string $baseUrl, LoggerInterface $logger)
    {
        $this->baseUrl = $baseUrl;
        $this->httpClient = new Client();
        $this->logger = $logger;
    }

    /** Get a login url for idp
     * @param String $redirect Path to redirect to after login
     * @return String URL
     */
    public function loginUrl(string $redirect)
    {
        // Create complete request url
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/login");
        $uri = $uri->withQuery("redirect=" . urlencode($redirect));

        return $uri->__toString();
    }

    /**
     * Check if user session is valid
     * @return bool
     */
    public function validateToken()
    {
        // If no token was sent then session cannot be valid
        if (!$this->tokenExists()) return false;

        // Create complete request url
        $uri = new Uri($this->baseUrl);
        $uri = $uri->withPath("identityprovider");
        $uri = $uri->withPath($uri->getPath() . "/validate");
    
        $this->logger->debug("Validate on Url $uri");
        
        try {
            $validationResponse = $this->httpClient->request(
                "GET",
                $uri,
                [
                    "headers" => [
                        "Authorization" => "Bearer " . $this->getToken(),
                        "Accept" => "application/json",
                        "verify" => false,
                        "http_errors"  => false
                    ]
                ]
            );
    
            $this->logger->debug("Validation status", [$validationResponse->getStatusCode()]);

            return ($validationResponse->getStatusCode() == 200);
        } catch (GuzzleException $e) {
            return false;
        }
    }

    /**
     * Checks whether the AuthSessionId-Cookie exists
     * @return bool
     */
    public function tokenExists()
    {
        $this->logger->debug("Token exists?", [isset($_COOKIE["AuthSessionId"])]);
        return isset($_COOKIE["AuthSessionId"]);
    }

    /**
     * Get the d.ecs identity provider token provided by the user
     * @return mixed|null Returns null if no Cookie is given
     */
    public function getToken()
    {
        return $_COOKIE["AuthSessionId"] ?? null;
    }

    /**
     * Get all users from IDP
     */
    public function getUsers()
    {
        throw new \Exception("Not implemented");
    }

    /**
     * Get all groups from IDP
     */
    public function getGroups()
    {
        throw new \Exception("Not implemented");
    }
}