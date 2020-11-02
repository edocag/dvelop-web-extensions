<?php

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
