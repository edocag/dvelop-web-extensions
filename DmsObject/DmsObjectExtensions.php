<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Edoc\Dvelop\Cloud\Extensions\DmsObject;


use Edoc\Dvelop\Cloud\Extensions\Link;

class DmsObjectExtensions
{
    /** @var $extensions DmsObjectExtension[] */
    public $extensions;
    /** @var $self Link */
    public $self;
    
    /**
     * DmsObjectExtensions constructor.
     * @param DmsObjectExtension[] $extensions
     * @param String $self
     */
    public function __construct(array $extensions, String $self)
    {
        $this->extensions = $extensions;
        $this->self = $self;
    }
    
}