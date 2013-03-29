<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Equipment;

use Star\Component\Hoard\Equipment\Type\MagicType;
use Star\Component\Hoard\Equipment\Type\MasterworkType;
use Star\Component\Hoard\Equipment\Equipment;
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

    public function testManageAbility()
    {
        $equipment       = $this->getEquipment();
        $ability         = $this->getMockAbility();
        $notFoundAbility = $this->getMockAbility();

        $this->assertCount(0, $equipment->getAbilities());
        $this->assertSame($equipment, $equipment->addAbility($ability));
        $this->assertCount(1, $equipment->getAbilities());
        $this->assertSame($equipment, $equipment->removeAbility($notFoundAbility));
        $this->assertCount(1, $equipment->getAbilities());
        $this->assertSame($equipment, $equipment->removeAbility($ability));
        $this->assertCount(0, $equipment->getAbilities());
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

    public function testAddSpecialAbilityAddsValue()
    {
        $equipment = $this->getEquipment(null, self::BASE_COST);

        $abilityOneCost = 300;
        $abilityOne = $this->getMockAbility();
        $abilityOne->expects($this->once())
            ->method("getCost")
            ->will($this->returnValue($abilityOneCost));
        $this->assertSame($equipment, $equipment->addAbility($abilityOne));

        $abilityTwoCost = 2000;
        $abilityTwo = $this->getMockAbility();
        $abilityTwo->expects($this->once())
            ->method("getCost")
            ->will($this->returnValue($abilityTwoCost));
        $equipment->addAbility($abilityTwo);

        $this->assertSame(
            self::BASE_COST + $abilityOneCost + $abilityTwoCost,
            $equipment->getCost(),
            "The equipment cost should be changed based on abilities"
        );
    }
}
