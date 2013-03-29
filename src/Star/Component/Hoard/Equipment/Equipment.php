<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\Ability\AbilityInterface;
use Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException;
use Star\Component\Hoard\Equipment\Type;

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

    /**
     * The abilities associated to the item
     *
     * @var array
     */
    protected $abilities;

    public function __construct($name = null, $baseCost = 0)
    {
        $this->name      = $name;
        $this->baseCost  = $baseCost;
        $this->types     = array();
        $this->abilities = array();
    }

    /**
     * Returns the equipment's name
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

    /**
     * Returns the equipment final cost
     *
     * @return number
     */
    public function getCost()
    {
        $cost = $this->baseCost;
        foreach ($this->abilities as $ability) {
            $cost += $ability->getCost();
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
     * Remove the $type
     *
     * @param Type $type
     *
     * @return Equipment
     */
    public function removeType(Type $type)
    {
        $index = array_search($type, $this->types, true);
        if (false !== $index) {
            unset($this->types[$index]);
        }

        return $this;
    }

    /**
     * Returns the $types
     *
     * @return string
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Add an ability
     *
     * @param AbilityInterface $ability
     *
     * @return Equipment
     */
    public function addAbility(AbilityInterface $ability)
    {
        $this->abilities[] = $ability;

        return $this;
    }

    /**
     * Returns the abilities
     *
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Remove the ability
     *
     * @param AbilityInterface $ability
     *
     * @return Equipment
     */
    public function removeAbility(AbilityInterface $ability)
    {
        $index = array_search($ability, $this->abilities, true);
        if (false !== $index) {
            unset($this->abilities[$index]);
        }

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