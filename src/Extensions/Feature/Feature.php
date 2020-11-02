<?php

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
    /** @var $color String Background color in HEX */
    public $color;
    /** @var $iconURI String relative URL to an icon with size 32x32px in PNG or SVG */
    public $iconURI;
    /** @var Badge */
    public $badge;

    /**
     * Feature constructor.
     *
     * @param String $title
     * @param String $subtitle
     * @param String $description
     * @param String $summary
     * @param String $url
     * @param String $color
     * @param String $icon
     * @param $count mixed Badge counter
     */
    public function __construct(
        String $title,
        String $subtitle,
        String $description,
        String $summary,
        String $url,
        String $color,
        String $icon,
        $count
    )
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->summary = $summary;
        $this->url = $url;
        $this->color = $color;
        $this->iconURI = $icon;

        if (is_int($count)) {
            $this->badge = new Badge($count);
        }
    }
}
