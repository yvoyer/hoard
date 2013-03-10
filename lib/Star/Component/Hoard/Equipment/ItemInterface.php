<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

/**
 * An item object
 *
 * @author Yannick Voyer
 */
interface ItemInterface
{
    /**
     * Returns the name
     *
     * @return string
     */
    public function getName();

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Returns the value
     *
     * @return float
     */
    public function getValue();

    /**
     * Set the value
     *
     * @param float $value
     */
    public function setValue($value);

    /**
     * Returns whether the item is magic
     *
     * @return boolean
     */
    public function IsMagic();

    /**
     * Set whether the item is magic
     *
     * @param boolean $isMagic
     */
    public function setIsMagic($isMagic);
}