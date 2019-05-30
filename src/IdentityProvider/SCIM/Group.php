<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

namespace IdentityProvider\SCIM;


/**
 * Class Group
 * @package IdentityProvider\SCIM
 */
class Group
{
    /**
     * @var string $value
     */
    public $value;
    /**
     * @var string
     */
    public $display;

    /**
     * Group constructor.
     * @param string $value
     * @param string $display
     */
    public function __construct(string $value, string $display)
    {
        $this->value = $value;
        $this->display = $display;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getDisplay(): string
    {
        return $this->display;
    }

    /**
     * @param string $display
     */
    public function setDisplay(string $display)
    {
        $this->display = $display;
    }
}
