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
    const TYPE_WEAPON = "WEAPON";
    const TYPE_MAGIC = "MAGIC";
    const TYPE_MASTERWORK = "MASTERWORK";

    /**
     * The base cost of the equipment
     *
     * @var float
     */
    protected $baseCost = 0;

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
    protected $types = array();

    /**
     * The abilities associated to the item
     *
     * @var array
     */
    protected $abilities = array();

    // @todo $args could Optionizable
    public function __construct(array $args = array())
    {
        $this->setBaseCost($args);
        $this->setName($args);

        // Collections should not have setters
        $this->types     = array();
        $this->abilities = array();
    }

    /**
     * Set the name
     *
     * @param array|string $value The value
     *
     * @return \Star\Component\Hoard\Equipment\Equipment
     */
    public function setName($value)
    {
        if (is_array($value)) {
            if (isset($value["name"])) {
                $value = $value["name"];
            }
        }

        $this->name = $value;

        return $this;
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
     * Set the base cost for the equipment
     *
     * @param array|string $value The value
     *
     * @return \Star\Component\Hoard\Equipment\Equipment
     */
    public function setBaseCost($value)
    {
        if (is_array($value)) {
            if (isset($value["baseCost"])) {
                $value = $value["baseCost"];
            }
        }
        $this->baseCost = $value;

        return $this;
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
     * Returns the base value
     *
     * @return number
     */
    public function getBaseCost()
    {
        return $this->baseCost;
    }

    /**
     * Retruns whether the equipment is magical
     *
     * @return bool
     */
    public function isMagic()
    {
        return $this->hasType(self::TYPE_MAGIC);
    }

    /**
     * Retruns whether the equipment is masterwork
     *
     * @return bool
     */
    public function isMasterwork()
    {
        return $this->hasType(self::TYPE_MASTERWORK);
    }

    /**
     * Add the $type
     *
     * @param string $type
     *
     * @return bool
     */
    public function addType($type)
    {
        if (self::TYPE_MAGIC === $type) {
            $this->addType(self::TYPE_MASTERWORK);
        }

        $success = $this->hasType($type);
        if (false === $success) {
            $this->types[$type] = $type;
        }

        return !$success;
    }

    /**
     * Returns whether the $type is present in the collection
     *
     * @param string $type
     *
     * @return bool
     */
    private function hasType($type)
    {
        return array_key_exists($type, $this->types);
    }

    /**
     * Remove the $type
     *
     * @param string $type
     *
     * @return bool
     */
    public function removeType($type)
    {
        $success = $this->hasType($type);
        if ($success) {
            unset($this->types[$type]);
        }

        return $success;
    }

    /**
     * Returns the $types
     *
     * @return string
     */
    public function getTypes()
    {
        return array_values($this->types);
    }

    /**
     * Returns the exported version for printing in a file
     *
     * @return string
     */
    public function export()
    {
        // @todo Move to a decorator
        return $this->getName() . ";Types:" . implode(",", $this->types);
    }

    /**
     * Add an ability
     *
     * @param AbilityInterface $ability
     *
     * @return bool
     */
    public function addAbility(AbilityInterface $ability)
    {
        $index   = array_search($ability, $this->abilities);
        $success = false;
        if (false === $index) {
            $this->abilities[] = $ability;
            $success = true;
        }

        return $success;
    }

    /**
     * Remove the ability
     *
     * @param AbilityInterface $ability
     *
     * @return bool
     */
    public function removeAbility(AbilityInterface $ability)
    {
        $index   = array_search($ability, $this->abilities, true);
        $success = false;
        if (false !== $index) {
            unset($this->abilities[$index]);
            $success = true;
        }

        return $success;
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
     * Returns the string representation of the type
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}