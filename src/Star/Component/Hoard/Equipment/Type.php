<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException;
use Star\Component\Hoard\Object;

/**
 * @author Yannick Voyer
 *
 * Class defining the types of equipments
 */
class Type extends Object
{
    /**
     * The name of the type
     *
     * @var string
     */
    protected $name;

    public function __construct(array $args = array())
    {
        $this->setName($args);
    }

    /**
     * Set the name of the type
     *
     * @param array|string $value The value
     *
     * @return \Star\Component\Hoard\Equipment\Type
     */
    public function setName($value)
    {
        //         $defaultValue = 0;
        if (is_array($value)) {
            if (isset($value["name"])) {
                $value = $value["name"];
            }
        }

        $this->name = $value;

        return $this;
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
