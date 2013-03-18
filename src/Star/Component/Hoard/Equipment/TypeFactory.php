<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Exception\InvalidArgumentException;

/**
 * @author Yannick Voyer
 *
 * Factory for equipment types
 */
class TypeFactory
{
    /**
     * The namespace for the types
     *
     * @var string
     */
    private $namespace;

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * Create a type
     *
     * @param string $type
     *
     * @return Star\Component\Hoard\Equipment\Type\TypeInterface
     */
    public function createType($type)
    {
        $class = $this->namespace . "\\" . $type;
        if (false === class_exists($class)) {
            throw new InvalidArgumentException("The marker '$type' is not supported");
        }

        return new $class();
    }
}
