<?php

namespace Extensions\DmsObject;


class ActivationCondition
{
    /** @var $propertyId String */
    public $propertyId;
    /** @var $operator String */
    public $operator;
    /** @var $values String[] */
    public $values;
    
    /**
     * ActivationCondition constructor.
     * @param String $propertyId
     * @param String $operator
     * @param String[] $values
     */
    public function __construct(String $propertyId, String $operator, array $values)
    {
        $this->propertyId = $propertyId;
        $this->operator = $operator;
        $this->values = $values;
    }
}