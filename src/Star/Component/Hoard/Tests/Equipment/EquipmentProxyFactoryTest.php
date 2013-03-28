<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Tests\Equipment;

use Star\Component\Hoard\Equipment\EquipmentProxyFactory;
use Star\Component\Hoard\Tests\HoardTestCase;

/**
 * @author Yannick Voyer
 *
 * @covers Star\Component\Hoard\Equipment\EquipmentProxyFactory
 */
class EquipmentProxyFactoryTest extends HoardTestCase
{
    /**
     * @var Star\Component\Hoard\Equipment\EquipmentProxyFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new EquipmentProxyFactory();
    }

    public function testCreateEquipment()
    {
        $marker           = ":EQUIPMENT";
        $equipment        = $this->getMockEquipment();
        $equipmentFactory = $this->getMockEquipmentFactory();
        $equipmentFactory->expects($this->once())
            ->method("supportsMarker")
            ->will($this->returnValue(true));
        $equipmentFactory->expects($this->once())
            ->method("createEquipment")
            ->will($this->returnValue($equipment));
        $equipmentFactory->expects($this->once())
            ->method("getMarker")
            ->will($this->returnValue($marker));

        $otherEquipmentFactory = $this->getMockEquipmentFactory();
        $equipmentFactory->expects($this->once())
            ->method("getMarker")
            ->will($this->returnValue("other-type"));

        $this->factory->registerType($otherEquipmentFactory);
        $this->factory->registerType($equipmentFactory);

        $this->assertInstanceOf(
            "Star\Component\Hoard\Equipment\EquipmentInterface",
            $this->factory->createEquipment($marker)
        );
    }

    /**
     * @expectedException        Star\Component\Hoard\Exception\InvalidArgumentException
     * @expectedExceptionMessage The marker is not registered
     */
    public function testTypeMustBeRegistered()
    {
        $this->factory->createEquipment(":EQUIPMENT");
    }

    /**
     * @expectedException        Star\Component\Hoard\Exception\InvalidArgumentException
     * @expectedExceptionMessage The marker can't be registered more than once
     */
    public function testTypeCanBeDefinedOnlyOnce()
    {
        $equipment        = $this->getMockEquipment();
        $equipmentFactory = $this->getMockEquipmentFactory();
        $equipmentFactory->expects($this->exactly(2))
            ->method("getMarker")
            ->will($this->returnValue(":EQUIPMENT"));

        $this->factory->registerType($equipmentFactory);
        $this->factory->registerType($equipmentFactory);
    }
}
