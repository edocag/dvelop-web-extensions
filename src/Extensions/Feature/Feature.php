<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Extensions\Feature;


class Feature
{
    /** @var $title String */
    public $title;
    /** @var $subtitle String */
    public $subtitle;
    /** @var $description String */
    public $description;
    /** @var $summary String */
    public $summary;
    /** @var $url String */
    public $url;
    /** @var $color String */
    public $color;
    /** @var $iconURI String */
    public $iconURI;

    /**
     * Feature constructor.
     * @param String $title
     * @param String $subtitle
     * @param String $description
     * @param String $summary
     * @param String $url
     * @param String $color
     * @param String $icon
     */
    public function __construct(
        String $title,
        String $subtitle,
        String $description,
        String $summary,
        String $url,
        String $color,
        String $icon
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->summary = $summary;
        $this->url = $url;
        $this->color = $color;
        $this->iconURI = $icon;
    }
}
