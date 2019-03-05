<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

namespace IdentityProvider\SCIM;


/**
 * Class Username
 * @package IdentityProvider\SCIM
 */
class Username
{
    /**
     * @var $formatted String
     */
    public $formatted;
    /**
     * @var $familyName String
     */
    public $familyName;
    
    /**
     * Username constructor.
     * @param String $formatted
     * @param String $familyName
     * @param String $givenName
     * @param String $middleName
     * @param String $honoricPrefix
     * @param String $honoricSuffix
     */
    public function __construct(
        String $formatted,
        String $familyName,
        String $givenName,
        String $middleName,
        String $honoricPrefix,
        String $honoricSuffix
    ) {
        $this->formatted = $formatted;
        $this->familyName = $familyName;
        $this->givenName = $givenName;
        $this->middleName = $middleName;
        $this->honoricPrefix = $honoricPrefix;
        $this->honoricSuffix = $honoricSuffix;
    }
    
    /**
     * @return String
     */
    public function getFormatted(): String
    {
        return $this->formatted;
    }
    
    /**
     * @param String $formatted
     */
    public function setFormatted(String $formatted)
    {
        $this->formatted = $formatted;
    }
    
    /**
     * @return String
     */
    public function getFamilyName(): String
    {
        return $this->familyName;
    }
    
    /**
     * @param String $familyName
     */
    public function setFamilyName(String $familyName)
    {
        $this->familyName = $familyName;
    }
    
    /**
     * @return String
     */
    public function getGivenName(): String
    {
        return $this->givenName;
    }
    
    /**
     * @param String $givenName
     */
    public function setGivenName(String $givenName)
    {
        $this->givenName = $givenName;
    }
    
    /**
     * @return String
     */
    public function getMiddleName(): String
    {
        return $this->middleName;
    }
    
    /**
     * @param String $middleName
     */
    public function setMiddleName(String $middleName)
    {
        $this->middleName = $middleName;
    }
    
    /**
     * @return String
     */
    public function getHonoricPrefix(): String
    {
        return $this->honoricPrefix;
    }
    
    /**
     * @param String $honoricPrefix
     */
    public function setHonoricPrefix(String $honoricPrefix)
    {
        $this->honoricPrefix = $honoricPrefix;
    }
    
    /**
     * @return String
     */
    public function getHonoricSuffix(): String
    {
        return $this->honoricSuffix;
    }
    
    /**
     * @param String $honoricSuffix
     */
    public function setHonoricSuffix(String $honoricSuffix)
    {
        $this->honoricSuffix = $honoricSuffix;
    }
    /**
     * @var $givenName String
     */
    public $givenName;
    /**
     * @var $middleName String
     */
    public $middleName;
    /**
     * @var $honoricPrefix String
     */
    public $honoricPrefix;
    /**
     * @var $honoricSuffix String
     */
    public $honoricSuffix;
}