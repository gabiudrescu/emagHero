<?php

namespace Emagia\Component\Properties;

abstract class AbstractProperty
{
    public function __construct($name, $min, $max) {

        $this->validate($min, $max, $name);

        $this->name = $name;
        $this->value = mt_rand($min, $max);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getName()
    {
        return $this->name;
    }

    public function validate($min, $max, $name)
    {
        if (!($min >= static::MIN)){
            throw new \InvalidArgumentException(sprintf('%s should be bigger than %s', $min, static::MIN));
        }

        if (!($max <= static::MAX)){
            throw new \InvalidArgumentException(sprintf('%s should be smaller than %s', $max, static::MAX));
        }

        if (empty($name) && is_string($name)){
            throw new \InvalidArgumentException('A name for this property must be provided');
        }
    }
}
