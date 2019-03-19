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
     * @var string $formatted
     */
    public $formatted;
    /**
     * @var string $familyName
     */
    public $familyName;
    
    /**
     * Username constructor.
     * @param string $formatted
     * @param string $familyName
     * @param string $givenName
     * @param string $middleName
     * @param string $honoricPrefix
     * @param string $honoricSuffix
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
     * @return string
     */
    public function getFormatted(): String
    {
        return $this->formatted;
    }
    
    /**
     * @param string $formatted
     */
    public function setFormatted(String $formatted)
    {
        $this->formatted = $formatted;
    }
    
    /**
     * @return string
     */
    public function getFamilyName(): String
    {
        return $this->familyName;
    }
    
    /**
     * @param string $familyName
     */
    public function setFamilyName(String $familyName)
    {
        $this->familyName = $familyName;
    }
    
    /**
     * @return string
     */
    public function getGivenName(): String
    {
        return $this->givenName;
    }
    
    /**
     * @param string $givenName
     */
    public function setGivenName(String $givenName)
    {
        $this->givenName = $givenName;
    }
    
    /**
     * @return string
     */
    public function getMiddleName(): String
    {
        return $this->middleName;
    }
    
    /**
     * @param string $middleName
     */
    public function setMiddleName(String $middleName)
    {
        $this->middleName = $middleName;
    }
    
    /**
     * @return string
     */
    public function getHonoricPrefix(): String
    {
        return $this->honoricPrefix;
    }
    
    /**
     * @param string $honoricPrefix
     */
    public function setHonoricPrefix(String $honoricPrefix)
    {
        $this->honoricPrefix = $honoricPrefix;
    }
    
    /**
     * @return string
     */
    public function getHonoricSuffix(): String
    {
        return $this->honoricSuffix;
    }
    
    /**
     * @param string $honoricSuffix
     */
    public function setHonoricSuffix(String $honoricSuffix)
    {
        $this->honoricSuffix = $honoricSuffix;
    }
    /**
     * @var string $givenName
     */
    public $givenName;
    /**
     * @var string
*/
    public $middleName;
    /**
     * @var string
     */
    public $honoricPrefix;
    /**
     * @var string
     */
    public $honoricSuffix;
}