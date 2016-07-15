<?php

namespace Emagia\Component\Properties;

class Health extends AbstractProperty implements PropertyInterface
{
    const MIN = 70;

    const MAX = 100;

    public function __construct($min, $max)
    {
        parent::__construct('Health', $min, $max);
    }
}
