<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Bonus;

/**
 * @author Yannick Voyer
 *
 * Contract for the bonus classes.
 */
interface BonusInterface
{
    /**
     * Returns the value for the bonus
     *
     * @return string
     */
    public function __toString();

    /**
     * Returns the value for the plus
     *
     * @return string
     */
    public function getPlus();
}
