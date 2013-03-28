<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\Type\Type;

/**
 * An equipment object
 *
 * @author Yannick Voyer
 */
class Equipment
{
    /**
     * The base cost of the equipment
     *
     * @var float
     */
    protected $baseCost;

    /**
     * The name of the item
     *
     * @var string
     */
    protected $name;

    /**
     * The types associated to the item
     *
     * @var array
     */
    protected $types;

    public function __construct($name = null, $baseCost = 0)
    {
        $this->name     = $name;
        $this->baseCost = $baseCost;
        $this->types    = array();
    }

    /**
     * Returns the equipment's name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the equipment final cost
     *
     * @return number
     */
    public function getCost()
    {
        $cost = $this->baseCost;
        foreach ($this->types as $type) {
            $cost += $type->getCost();
        }

        return $cost;
    }

    /**
     * Returns wheter the item is magic
     *
     * @return boolean
     */
    public function isMagic()
    {
        $isMagic = false;
        foreach ($this->types as $type) {
            if ($type->isMagic()) {
                $isMagic = true;
                break;
            }
        }

        return $isMagic;
    }

    /**
     * Add the $type
     *
     * @param string $type
     *
     * @return Equipment
     */
    public function addType(Type $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Returns the base value
     *
     * @return number
     */
    public function getBaseCost()
    {
        return $this->baseCost;
    }
}