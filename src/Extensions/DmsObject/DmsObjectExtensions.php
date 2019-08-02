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
    /** @var array $_links */
    public $_links;

    /**
     * DmsObjectExtensions constructor.
     * @param DmsObjectExtension[] $extensions
     * @param Link $self
     */
    public function __construct(array $extensions, Link $self)
    {
        $this->extensions = $extensions;
        $this->_links = [ "self" => $self ];
    }

}
