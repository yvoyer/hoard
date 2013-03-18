<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Equipment;

use Star\Component\Hoard\Equipment\TypeFactory;
use Star\Component\Hoard\Tests\HoardTestCase;

class TypeFactoryTest extends HoardTestCase
{
    /**
     * @return \Star\Component\Hoard\Equipment\TypeFactory
     */
    private function getFactory()
    {
        return new TypeFactory("Star\Component\Hoard\Tests\Equipment");
    }

    public function testCreateType()
    {
        $factory = $this->getFactory();

        $this->assertInstanceOf(
            "Star\Component\Hoard\Tests\Equipment\MockType",
            $factory->createType("MockType")
        );
    }

    /**
     * @expectedException        Star\Component\Hoard\Exception\InvalidArgumentException
     * @expectedExceptionMessage The marker 'MockInvalidType' is not supported
     */
    public function testCreateTypeWithInvalidMarkerThrowsException()
    {
        $factory = $this->getFactory();
        $factory->createType("MockInvalidType");
    }
}

class MockType
{}
