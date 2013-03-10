<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Exception\Integrity;

use Star\Component\Hoard\Exception\IntegrityException;

class EquipmentIntegrityException extends IntegrityException
{
    /**
     * @return \Star\Component\Hoard\Exception\Integrity\EquipmentIntegrityException
     */
    public static function getNameNotNullableException()
    {
        return new self("The equipment's name can't be null");
    }

    /**
     * @return \Star\Component\Hoard\Exception\Integrity\EquipmentIntegrityException
     */
    public static function getValueNotNullableException()
    {
        return new self("The equipment's value can't be null");
    }
}