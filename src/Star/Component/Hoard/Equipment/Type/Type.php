<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

abstract class Type
{
    private $types = array();

    public abstract function getValue();

    protected function addType($type)
    {
        $this->types[] = $type;
    }

    public function __toString()
    {
        return implode(",", $this->types);
    }
}
