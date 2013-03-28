<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

abstract class Type
{
    private $types = array();

    /**
     * Returns the cost
     *
     * @return float
     */
    public abstract function getCost();

    /**
     * Returns the cost of the equipment
     *
     * @return float
     */
    protected function addType($type)
    {
        $this->types[] = $type;
    }

    public function __toString()
    {
        return implode(",", $this->types);
    }

    /**
     * Returns whether the type is considered magic
     *
     * @return boolean
    */
    public function isMagic()
    {

    }
}
