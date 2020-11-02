<?php

namespace Extensions;


class Root
{
    use HalJson;

    /** @var string $title */
    public $title;
    /** @var string $version */
    public $version;

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
