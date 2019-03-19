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
     * @return string
     */
    public function getValue(): String
    {
        return $this->value;
    }
    
    /**
     * @param string $value
     */
    public function setValue(String $value)
    {
        $this->value = $value;
    }
    
    /**
     * @return string
     */
    public function getDisplay(): String
    {
        return $this->display;
    }
    
    /**
     * @param string $display
     */
    public function setDisplay(String $display)
    {
        $this->display = $display;
    }
    /**
     * @var string
     */
    public $display;
    
    /**
     * Group constructor.
     * @param string $value
     * @param string $display
     */
    public function __construct(String $value, String $display)
    {
        $this->value = $value;
        $this->display = $display;
    }
}