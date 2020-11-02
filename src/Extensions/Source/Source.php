<?php

namespace Extensions\Source;


class Source
{
    /**
     * Indicates the unique identifier of the source.
     * The ID must be a relative URI. The relative URI should start with the name of the app
     * that provides the source system in order to ensure uniqueness (e.g. /myapp/sources/mysource).
     * @var string $id
     */
    public $id;

    /**
     * Indicates the display name as displayed in the Source field in the Mappings administrator interface.
     * For internationalization purposes, DMSApp works with the HTTP header Accept-Language.
     * This HTTP header must be evaluated by the source system, and the display name for the source must
     * be displayed in the corresponding language.
     * @var string $displayName
     */
    public $displayName;

    /**
     *    Indicates the array of the categories for the source that are provided for managing and processing mapping.
     * @var array $categories
     */
    public $categories;

    /**
     *    Indicates the array of the properties for the source that are provided for managing and processing mapping.
     * @var array $properties
     */
    public $properties;

    /**
     * Source constructor.
     * @param string $id
     * @param string $displayName
     * @param array $categories
     * @param array $properties
     */
    public function __construct(string $id, string $displayName, array $categories, array $properties)
    {
        $this->id = $id;
        $this->displayName = $displayName;
        $this->categories = $categories;
        $this->properties = $properties;
    }

}
