<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Factory;

/**
 * Contract for building an equipment
 *
 * @author Yannick Voyer
 */
interface EquipmentFactoryInterface
{
    /**
     * Returns the marker identifying this marker
     *
     * @return string
     */
    public function getMarker();

    /**
     * Returns whether the $marker is supported
     *
     * @param string $marker
     *
     * @return boolean
     */
    public function supportsMarker($marker);

    /**
     * Create the equipment
     *
     * @return Star\Component\Hoard\Equipment\EquipmentInterface
     */
    public function createEquipment();
}