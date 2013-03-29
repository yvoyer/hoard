<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Equipment;

use Star\Component\Hoard\Equipment\Type\MagicType;

use Star\Component\Hoard\Equipment\Type\MasterworkType;

use \Star\Component\Hoard\Equipment\Equipment;
use Star\Component\Hoard\Tests\HoardTestCase;

class EquipmentTest extends HoardTestCase
{
    const BASE_COST = 15;

    /**
     * @return \Star\HoardBundle\Entity\Equipment
     */
    private function getEquipment($name = null, $baseCost = null)
    {
        return new Equipment($name, $baseCost);
    }

    public function testGetBaseCost()
    {
        $equipment = $this->getEquipment(null, self::BASE_COST);
        $this->assertSame(self::BASE_COST, $equipment->getBaseCost());
    }

    public function testAddTypeValueToCost()
    {
        $typeCost = 300;

        $type = $this->getMockEquipmentType();
        $type->expects($this->once())
            ->method("getCost")
            ->will($this->returnValue($typeCost));

        $equipment = $this->getEquipment(null, self::BASE_COST);
        $equipment->addType($type);

        $cost = self::BASE_COST + $typeCost;
        $this->assertSame($cost, $equipment->getCost());
    }

    public function testIsMagic()
    {
        $equipment = $this->getEquipment();
        $this->assertFalse($equipment->isMagic());

        $type = $this->getMockEquipmentType();
        $type->expects($this->exactly(2))
            ->method("isMagic")
            ->will($this->returnValue(false));
        $equipment->addType($type);
        $this->assertFalse($equipment->isMagic());

        $type = $this->getMockEquipmentType();
        $type->expects($this->once())
            ->method("isMagic")
            ->will($this->returnValue(true));
        $equipment->addType($type);
        $this->assertTrue($equipment->isMagic());
    }

    /**
     * @expectedException        Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException
     * @expectedExceptionMessage The attribute 'name' can't be null.
     */
    public function testNameCantBeNull()
    {
        $equipment = $this->getEquipment();
        $equipment->getName();
    }

    public function testGetName()
    {
        $equipment = $this->getEquipment("Short Sword");
        $this->assertSame("Short Sword", $equipment->getName());
    }
}
