<?php

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
        string $formatted,
        string $familyName,
        string $givenName,
        string $middleName,
        string $honoricPrefix,
        string $honoricSuffix
    )
    {
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
    public function getFormatted(): string
    {
        return $this->formatted;
    }

    /**
     * @param string $formatted
     */
    public function setFormatted(string $formatted)
    {
        $this->formatted = $formatted;
    }

    /**
     * @return string
     */
    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    /**
     * @param string $familyName
     */
    public function setFamilyName(string $familyName)
    {
        $this->familyName = $familyName;
    }

    /**
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     */
    public function setGivenName(string $givenName)
    {
        $this->givenName = $givenName;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName(string $middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getHonoricPrefix(): string
    {
        return $this->honoricPrefix;
    }

    /**
     * @param string $honoricPrefix
     */
    public function setHonoricPrefix(string $honoricPrefix)
    {
        $this->honoricPrefix = $honoricPrefix;
    }

    /**
     * @return string
     */
    public function getHonoricSuffix(): string
    {
        return $this->honoricSuffix;
    }

    /**
     * @param string $honoricSuffix
     */
    public function setHonoricSuffix(string $honoricSuffix)
    {
        $this->honoricSuffix = $honoricSuffix;
    }

}
