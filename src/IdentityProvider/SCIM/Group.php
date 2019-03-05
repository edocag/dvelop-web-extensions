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
     * @var $value String
     */
    public $value;
    
    /**
     * @return String
     */
    public function getValue(): String
    {
        return $this->value;
    }
    
    /**
     * @param String $value
     */
    public function setValue(String $value)
    {
        $this->value = $value;
    }
    
    /**
     * @return String
     */
    public function getDisplay(): String
    {
        return $this->display;
    }
    
    /**
     * @param String $display
     */
    public function setDisplay(String $display)
    {
        $this->display = $display;
    }
    /**
     * @var $display String
     */
    public $display;
    
    /**
     * Group constructor.
     * @param String $value
     * @param String $display
     */
    public function __construct(String $value, String $display)
    {
        $this->value = $value;
        $this->display = $display;
    }
}