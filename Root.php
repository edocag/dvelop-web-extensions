<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Edoc\Dvelop\Cloud\Extensions;


class Root
{
    /** @var $title String */
    public $title;
    /** @var $version String */
    public $version;
    /** @var $_links array */
    public $_links;
    
    /**
     * Root constructor.
     * @param String $title
     * @param String $version
     * @param array $_links
     */
    public function __construct(String $title, String $version, array $_links = [])
    {
        $this->title = $title;
        $this->version = $version;
        $this->_links = $_links;
    }
}