<?php

namespace HttpGateway;


class App
{
    public $app;
    public $destinationUri;
    
    /**
     * HttpGatewayApp constructor.
     * @param $app
     * @param $destinationUri
     */
    public function __construct($app, $destinationUri)
    {
        $this->app = $app;
        $this->destinationUri = $destinationUri;
    }
}