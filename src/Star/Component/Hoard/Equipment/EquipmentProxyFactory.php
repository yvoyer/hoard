<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Equipment\EquipmentInterface;
use Star\Component\Hoard\Equipment\Factory\EquipmentFactoryInterface;
use Star\Component\Hoard\Exception\InvalidArgumentException;

/**
 * @author Yannick Voyer
 *
 * Class responsible to create an Equipment object based on a type
 */
class EquipmentProxyFactory
{
    /**
     * Collection of Supported equipment builder
     *
     * @var array
     */
    private $builders = array();

    /**
     * Registers a $builder
     *
     * @param EquipmentFactoryInterface $builder The builder to register
     */
    public function registerType(EquipmentFactoryInterface $builder)
    {
        $marker = $builder->getMarker();
        if ($this->hasType($marker)) {
            throw new InvalidArgumentException("The marker can't be registered more than once");
        }

        $this->builders[$marker] = $builder;
    }

    /**
     * Retruns whether a $marker is register in the proxy
     *
     * @param string $marker The type
     *
     * @return boolean
     */
    private function hasType($marker)
    {
        return array_key_exists($marker, $this->builders);
    }

    /**
     * Create the requested $marker
     *
     * @param  string $marker The type to match
     *
     * @return EquipmentInterface
     */
    public function createEquipment($marker)
    {
        if (false === $this->hasType($marker)) {
            throw new InvalidArgumentException("The marker is not registered");
        }

        $builder   = $this->builders[$marker];
        $equipment = null;
        if ($builder->supportsMarker($marker)) {
            $equipment = $builder->createEquipment();
        }

        return $equipment;
    }
}