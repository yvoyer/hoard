<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

/**
 * @author Yannick Voyer
 *
 * Contract for equipments that can be sold
 */
interface Saleable
{
    /**
     * Returns the final price
     *
     * @return number
     */
    public function getPrice();
}