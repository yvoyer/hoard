<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

class MasterworkType extends Type
{
    public function __construct()
    {
        $this->addType("MASTERWORK");
    }

    public function getValue()
    {
        return 300;
    }
}
