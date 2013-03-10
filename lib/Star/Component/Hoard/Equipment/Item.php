<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

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

    public function __construct(ItemConfigurationInterface $configuration = null)
    {
        if (null !== $configuration) {
            $this->loadFromConfiguration($configuration);
        }
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::getName()
     */
    public function getName()
    {
        if (null === $this->name) {
            throw EquipmentIntegrityException::getNameNotNullableException();
        }

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
        if (null === $this->value) {
            throw EquipmentIntegrityException::getValueNotNullableException();
        }

        return $this->value;
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

    private function loadFromConfiguration(ObjectConfigurationInterface $configuration)
    {
        $array = $configuration->toArray();var_dump($array);
        foreach ($array as $key => $value) {
            $setter = "set" . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->{$setter}($value);
            }
        }
    }
}