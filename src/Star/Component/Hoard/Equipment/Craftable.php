<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

/**
 * @author Yannick Voyer
 *
 * Contract for equipments that can be craftable with a cost
 */
interface Craftable
{
    /**
     * Returns the final cost to craft the equipment
     *
     * @return number
     */
    public function getCost();
}