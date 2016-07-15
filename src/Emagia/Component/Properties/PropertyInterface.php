<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 15.07.2016
 * Time: 17:24
 */

namespace Emagia\Component\Properties;


interface PropertyInterface {

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct($min, $max);

    /**
     * @return int the value of the property should be returned
     */
    public function getValue();

    /**
     * @return string the name of the property should be returned
     */
    public function __toString();
}