<?php
/**
 * Copyright (c) 2019. edoc solutions ag
 */

/** contract app
 * edoc app server custom plugin file
 * created by tibens on 21.02.2019
 */

namespace Extensions\DmsObject;

class DmsObjectExtension
{
    /** @var $id String */
    public $id;
    /** @var $activationConditions ActivationCondition[] */
    public $activationConditions;
    /** @var $captions Caption[] */
    public $captions;
    /** @var $context String */
    public $context;
    /** @var $uriTemplate String */
    public $uriTemplate;
    /** @var $iconUri String */
    public $iconUri;

    /**
     * DmsObjectExtension constructor.
     * @param String $id
     * @param ActivationCondition[] $activationConditions
     * @param Caption[] $captions
     * @param String $context
     * @param String $uriTemplate
     * @param String $iconUri
     */
    public function __construct(
        String $id,
        array $activationConditions,
        array $captions,
        String $context,
        String $uriTemplate,
        String $iconUri
    )
    {
        $this->id = $id;
        $this->activationConditions = $activationConditions;
        $this->captions = $captions;
        $this->context = $context;
        $this->uriTemplate = $uriTemplate;
        $this->iconUri = $iconUri;
    }

}
