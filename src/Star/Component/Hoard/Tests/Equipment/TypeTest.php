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
    public function getType($name = null)
    {
        return new Type($name);
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
        $name = uniqid();

        $type = $this->getType($name);
        $this->assertSame($name, $type->getName());
        $this->assertSame($name, $type->__toString());
    }
}