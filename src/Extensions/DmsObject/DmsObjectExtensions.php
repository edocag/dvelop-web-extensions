<?php

namespace Extensions\DmsObject;


use Extensions\HalJson;
use Extensions\Link;

class DmsObjectExtensions
{
    use HalJson;

    /** @var $extensions DmsObjectExtension[] */
    public $extensions;

    /**
     * DmsObjectExtensions constructor.
     * @param DmsObjectExtension[] $extensions
     * @param Link $self
     */
    public function __construct(array $extensions, Link $self)
    {
        $this->extensions = $extensions;
        $this->_links = [
            "self" => $self
        ];
    }

}
