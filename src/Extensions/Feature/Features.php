<?php

namespace Extensions\Feature;


use Extensions\Link;

class Features
{
    /** @var Feature[] $features */
    public $features;
    /** @var Link */
    public $_links;

    /**
     * Features constructor.
     * @param Feature[] $features
     * @param Link $self
     */
    public function __construct(array $features, Link $self)
    {
        $this->features = $features;
        $this->_links = [
            "self" => $self
        ];
    }
}
