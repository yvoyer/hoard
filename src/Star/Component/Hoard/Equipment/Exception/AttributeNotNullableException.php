<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Exception;

use Star\Component\Hoard\Exception\InvalidArgumentException;

/**
 * @author Yannick Voyer
 *
 * Exception when an attribute should not be null
 */
class AttributeNotNullableException extends InvalidArgumentException
{
    public function __construct($attribute)
    {
        parent::__construct("The attribute '" . $attribute . "' can't be null.");
    }
}