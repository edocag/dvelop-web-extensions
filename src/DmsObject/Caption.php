<?php

namespace Edoc\Dvelop\Cloud\Extensions\DmsObject;


class Caption
{
    /** @var $culture String */
    public $culture;
    /** @var $caption String */
    public $caption;
    
    /**
     * Caption constructor.
     * @param String $culture
     * @param String $caption
     */
    public function __construct(String $culture, String $caption)
    {
        $this->culture = $culture;
        $this->caption = $caption;
    }
}