<?php

namespace Emagia\Component;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;

class CharacterFactory
{
    const classPath = 'Emagia\Component\Properties';

    /**
     * @var OptionsResolver
     */
    private $resolver;

    public function __construct(OptionsResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function build($name, array $propertyMap)
    {

        $properties = new ArrayCollection();

        foreach($propertyMap as $propertyName => $values)
        {
            $propertyClassName = $this->generateClassName($propertyName);
            $values = $this->validateValues($values);

            $property = new $propertyClassName($values['min'], $values['max']);

            $properties->set($propertyName, $property);
        }

        $character = new Character($name);

        $character->setProperties($properties);

        return $character;
    }

    private function generateClassName($propertyName)
    {
        $propertyClass = sprintf('%s\\%s', static::classPath, ucfirst($propertyName));

        if(!class_exists($propertyClass))
        {
            throw new NoSuchPropertyException(sprintf('%s class does not exist', $propertyClass));
        }

        return $propertyClass;
    }

    private function validateValues(array $values)
    {
        $mandatory = ['min', 'max'];
        $this->resolver->setRequired($mandatory);

        foreach($mandatory as $item)
        {
            $this->resolver->setAllowedTypes($item, 'int');
        }

        return $this->resolver->resolve($values);
    }
}
