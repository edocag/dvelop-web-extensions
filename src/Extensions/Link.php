<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Extensions;


class Link
{
/** @var $href String */
public $href;
/** @var $templated boolean */
public $templated;
    

    /**
     * Link constructor.
     * @param String $href
     * @param bool $templated
     */
    public function __construct(String $href, bool $templated = false)
    {
        $this->href = $href;
        $this->templated = $templated;
    }
}