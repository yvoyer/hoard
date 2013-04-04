<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException;

/**
 * @author Yannick Voyer
 *
 * Class defining the types of equipments
 */
class Type
{
    /**
     * The name of the type
     *
     * @var string
     */
    private $name;

    public function __construct(array $args = array())
    {
        $this->name = (isset($args["name"])) ? strval($args["name"]) : null;
    }

    /**
     * Returns the string representation of the type
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Returns the name of the type
     *
     * @return string
     */
    public function getName()
    {
        if (empty($this->name)) {
            throw new AttributeNotNullableException("name");
        }

        return $this->name;
    }
}
