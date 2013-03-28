<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Marker;

class EquipmentMarker implements MarkerInterface
{
    /**
     * @see \Star\Component\Hoard\Marker\MarkerInterface::getIdentifier()
     */
    public function getIdentifier()
    {
        return ":EQUIPMENT";
    }
}