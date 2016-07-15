<?php

namespace Emagia\Component;

use Doctrine\Common\Collections\ArrayCollection;
use Emagia\Component\Properties\PropertyInterface;

class Character
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|PropertyInterface[]
     */
    protected $properties;

    /**
     * @param string          $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param ArrayCollection $properties
     */
    public function setProperties(ArrayCollection $properties)
    {
        $this->properties = $properties;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * it will search the arrayCollection for a property based on the getter name
     *
     * @param $name
     * @param $arguments
     *
     * @return int
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $propertyName = str_replace('get', '', $name);

        /**
         * @var PropertyInterface $property
         */
        if (!($property = $this->properties->get($propertyName)))
        {
            throw new \Exception(sprintf('Could not find character property %s', $propertyName));
        }

        return $property->getValue();
    }
}
