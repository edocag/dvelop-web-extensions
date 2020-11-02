<?php


namespace Extensions\Feature;


class Badge
{
    public $count;

    /**
     * Badge constructor.
     *
     * @param $count
     */
    public function __construct($count)
    {
        $this->count = $count;
    }


}
