<?php

namespace HttpGateway;


class App
{
    /** @var $app String Application name */
    public $app;
    /** @var $destinationUri String */
    public $destinationUri;
    /** @var $instanceId String maximum 40 characters */
    public $instanceId;

    /**
     * HttpGatewayApp constructor.
     * @param $app
     * @param $destinationUri
     * @param string $instanceId
     */
    public function __construct($app, $destinationUri, $instanceId = "")
    {
        $this->app = $app;
        $this->destinationUri = $destinationUri;

        if (empty($instanceId)) {
            $instanceId = uniqid("auto_");
        }

        $this->instanceId = $instanceId;
    }
}
