<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment;

use Star\Component\Hoard\Tests\HoardTestCase;
use Star\Component\Hoard\Equipment\Type;

class TypeTest extends HoardTestCase
{
    public function getType(array $args = array())
    {
        return new Type($args);
    }

    /**
     * @expectedException        Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException
     * @expectedExceptionMessage The attribute 'name' can't be null.
     */
    public function testNameCantBeNull()
    {
        $this->getType()->getName();
    }

    public function testGetNameReturnsTheSetValue()
    {
        $options = array(
            "name" => uniqid()
        );

        $type = $this->getType($options);
        $this->assertSame($options["name"], $type->getName());
        $this->assertSame($options["name"], $type->__toString());
    }
}