<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Extensions\DmsObject;


use Extensions\Link;

class DmsObjectExtensions
{
    /** @var $extensions DmsObjectExtension[] */
    public $extensions;
    /** @var $self Link */
    public $self;
    
    /**
     * DmsObjectExtensions constructor.
     * @param DmsObjectExtension[] $extensions
     * @param Link $self
     */
    public function __construct(array $extensions, Link $self)
    {
        $this->extensions = $extensions;
        $this->self = $self;
    }
    
}