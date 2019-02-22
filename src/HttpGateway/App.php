<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 22.02.2019
 */
namespace Edoc\Dvelop\Cloud\HttpGateway;
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