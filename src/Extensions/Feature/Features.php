<?php

namespace Extensions\Feature;


use Extensions\HalJson;
use Extensions\Link;

class Features
{
    use HalJson;

    /** @var Feature[] $features */
    public $features;

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
