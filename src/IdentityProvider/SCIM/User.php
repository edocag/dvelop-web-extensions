<?php
/** dvelop-web-extensions
 * edoc app server custom plugin file
 * created by tibens on 25.02.2019
 */

namespace IdentityProvider\SCIM;


/**
 * Class User
 * @package IdentityProvider\SCIM
 */
class User
{
    /** @var string */
    public $id;
    /**
     * @var String
     */
    public $userName;
    
    /**
     * @return string
     */
    public function getId(): String
    {
        return $this->id;
    }
    
    /**
     * @param string $id
     */
    public function setId(String $id)
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getUserName(): String
    {
        return $this->userName;
    }
    
    /**
     * @param string $userName
     */
    public function setUserName(String $userName)
    {
        $this->userName = $userName;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getDisplayName(): String
    {
        return $this->displayName;
    }
    
    /**
     * @param string $displayName
     */
    public function setDisplayName(String $displayName)
    {
        $this->displayName = $displayName;
    }
    
    /**
     * @return string
     */
    public function getProfileUrl(): String
    {
        return $this->profileUrl;
    }
    
    /**
     * @param string $profileUrl
     */
    public function setProfileUrl(String $profileUrl)
    {
        $this->profileUrl = $profileUrl;
    }
    
    /**
     * @return string
     */
    public function getTitle(): String
    {
        return $this->title;
    }
    
    /**
     * @param string $title
     */
    public function setTitle(String $title)
    {
        $this->title = $title;
    }
    
    /**
     * @return string[]
     */
    public function getEmails(): array
    {
        return $this->emails;
    }
    
    /**
     * @param string[] $emails
     */
    public function setEmails(array $emails)
    {
        $this->emails = $emails;
    }
    
    /**
     * @return string[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }
    
    /**
     * @param string[] $photos
     */
    public function setPhotos(array $photos)
    {
        $this->photos = $photos;
    }
    
    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }
    
    /**
     * @param Group[] $groups
     */
    public function setGroups(array $groups)
    {
        $this->groups = $groups;
    }
    /**
     * @var $name
     */
    public $name;
    /**
     * @var string
     */
    public $displayName;
    /**
     * @var string
     */
    public $profileUrl; // TODO: Make URI?
    /**
     * @var string
     */
    public $title;
    /**
     * @var string[]
     */
    public $emails;
    /**
     * @var string[]
     */
    public $photos;
    /**
     * @var Group[]
     */
    public $groups;
}