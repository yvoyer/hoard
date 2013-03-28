<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Marker;

/**
 * Contract for markers
 *
 * @author Yannick Voyer
 */
interface MarkerInterface
{
    /**
     * Returns the identifier for the marker
     *
     * @return string
     */
    public function getIdentifier();
}
