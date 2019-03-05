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
    /** @var $id String */
    public $id;
    /**
     * @var $userName String
     */
    public $userName;
    
    /**
     * @return String
     */
    public function getId(): String
    {
        return $this->id;
    }
    
    /**
     * @param String $id
     */
    public function setId(String $id)
    {
        $this->id = $id;
    }
    
    /**
     * @return String
     */
    public function getUserName(): String
    {
        return $this->userName;
    }
    
    /**
     * @param String $userName
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
     * @return String
     */
    public function getDisplayName(): String
    {
        return $this->displayName;
    }
    
    /**
     * @param String $displayName
     */
    public function setDisplayName(String $displayName)
    {
        $this->displayName = $displayName;
    }
    
    /**
     * @return String
     */
    public function getProfileUrl(): String
    {
        return $this->profileUrl;
    }
    
    /**
     * @param String $profileUrl
     */
    public function setProfileUrl(String $profileUrl)
    {
        $this->profileUrl = $profileUrl;
    }
    
    /**
     * @return String
     */
    public function getTitle(): String
    {
        return $this->title;
    }
    
    /**
     * @param String $title
     */
    public function setTitle(String $title)
    {
        $this->title = $title;
    }
    
    /**
     * @return String[]
     */
    public function getEmails(): array
    {
        return $this->emails;
    }
    
    /**
     * @param String[] $emails
     */
    public function setEmails(array $emails)
    {
        $this->emails = $emails;
    }
    
    /**
     * @return String[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }
    
    /**
     * @param String[] $photos
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
     * @var $displayName String
     */
    public $displayName;
    /**
     * @var $profileUrl String
     */
    public $profileUrl; // TODO: Make URI?
    /**
     * @var $title String
     */
    public $title;
    /**
     * @var $emails String[]
     */
    public $emails;
    /**
     * @var $photos String[]
     */
    public $photos;
    /**
     * @var $groups Group[]
     */
    public $groups;
}