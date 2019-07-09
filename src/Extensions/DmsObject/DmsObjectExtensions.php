<?php

namespace Extensions\DmsObject;


use Extensions\Link;

class DmsObjectExtensions
{
    /** @var $extensions DmsObjectExtension[] */
    public $extensions;
    /** @var $self Link */
    public $_links;

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
