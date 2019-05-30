<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 30.04.2019
 */

namespace Extensions\Source;


class SourceCategory
{
    /**
     * Indicates the unique identifier of the source category.
     * @var string $key
     */
    public $key;
    
    /**
     * Indicates the display name as displayed in the Source field in the Categories area on the Mappings administration user interface.
     * For internationalization purposes, DMSApp works with the HTTP header Accept-Language.
     * This HTTP header must be evaluated by the source system, and the display name for the category must
     * be displayed in the corresponding language.
     * @var string $displayName
     */
    public $displayName;
    
    /**
     * SourceCategory constructor.
     * @param string $key
     * @param string $displayName
     */
    public function __construct(string $key, string $displayName)
    {
        $this->key = $key;
        $this->displayName = $displayName;
    }
}