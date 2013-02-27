<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Model;

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
        $this->name = $name;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::getValue()
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @see \Star\Component\Hoard\Model\ItemInterface::setValue()
     */
    public function setValue($value)
    {
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
}