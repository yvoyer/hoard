<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

/**
 * @author Yannick Voyer
 *
 * Contract for Equipment types
 */
interface TypeInterface
{
    /**
     * Returns the cost of the equipment
     *
     * @return float
     */
    public function getCost();

    /**
     * Returns whether the type is considered magic
     *
     * @return boolean
     */
    public function isMagic();
}