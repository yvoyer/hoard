<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\Ability\AbilityInterface;

use Star\Component\Hoard\Exception\Integrity\EquipmentIntegrityException;
use Star\Component\Hoard\Configuration\ObjectConfigurationInterface;
use Star\Component\Hoard\Equipment\Configuration\ItemConfigurationInterface;

/**
 * An item object
 *
 * @author Yannick Voyer
 */
class Item implements ItemInterface
{
    /**
     * The name of the item
     *
     * @var string
     */
    protected $name;

    /**
     * The value of the item
     *
     * @var float
     */
    protected $value;

    /**
     * Whether the item is magic
     *
     * @var boolean
     */
    protected $isMagic;

    /**
     * The special abilities of the item
     *
     * @var array
     */
    protected $abilities;

    public function __construct()
    {
        $this->abilities = array();
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::getName()
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::setName()
     */
    public function setName($name)
    {
        if (null === $name) {
            throw EquipmentIntegrityException::getNameNotNullableException();
        }

        $this->name = $name;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::getValue()
     */
    public function getValue()
    {
        $value = $this->value;
        foreach ($this->abilities as $ability) {
            $value += $ability->getValue();
        }

        return $value;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::setValue()
     */
    public function setValue($value)
    {
        if (null === $value) {
            throw EquipmentIntegrityException::getValueNotNullableException();
        }

        $this->value = $value;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::IsMagic()
     */
    public function IsMagic()
    {
        return $this->isMagic;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::setIsMagic()
     */
    public function setIsMagic($isMagic)
    {
        $this->isMagic = $isMagic;
    }

    /**
     * Set abilities
     *
     * @param array $abilities
     * @return Equipment
     */
    public function addAbility(AbilityInterface $ability)
    {
        $this->abilities[] = $ability;

        return $this;
    }

    /**
     * Get abilities
     *
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }
}