<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 30.04.2019
 */

namespace Extensions\Source;


class Sources
{
    /**
     * Provide all sources
     * @var array $sources
     */
    public $sources;
    
    /**
     * Sources constructor.
     * @param $sources
     */
    public function __construct($sources = [])
    {
        $this->sources = $sources;
    }
    
    /** Add single source
     * @param $source Source
     */
    public function add($source)
    {
        $this->sources[] = $source;
    }
}