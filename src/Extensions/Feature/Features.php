<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 03.05.2019
 */

namespace Extensions\Feature;


use Extensions\Link;

class Features
{
    /** @var Feature[] $features */
    public $features;
    /** @var Link $self */
    public $self;

    /**
     * Features constructor.
     * @param Feature[] $features
     * @param Link $self
     */
    public function __construct(array $features, Link $self)
    {
        $this->features = $features;
        $this->self = $self;
    }
}
