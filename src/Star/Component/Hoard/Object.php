<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard;

abstract class Object
{
    public function __construct(array $args = array())
    {
        foreach ($args as $attribute => $value) {
            $this->{$attribute} = $value;
        }
    }
}