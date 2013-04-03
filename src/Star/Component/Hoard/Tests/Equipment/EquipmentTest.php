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
        $this->assertFalse($equipment->isMagic(), "The equipment should be not magical by default");

        $equipment->addType(Equipment::IDENTIFIER_MAGIC);
        $this->assertTrue($equipment->isMagic(), "The equipment should be magical");
        $this->assertTrue($equipment->isMasterwork(), "The equipment should be masterwork");
    }

    public function testIsMasterwork()
    {
        $equipment = $this->getEquipment();
        $this->assertFalse($equipment->isMasterwork(), "The equipment should be not be masterwork by default");

        $equipment->addType(Equipment::IDENTIFIER_MASTERWORK);
        $this->assertTrue($equipment->isMasterwork(), "The equipment should be be masterwork");
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

    public function testSetGetType()
    {
        $equipment = $this->getEquipment();
        $types     = array(Equipment::IDENTIFIER_WEAPON);

        $this->assertSame($equipment, $equipment->setTypes($types));
        $this->assertSame($types, $equipment->getTypes());
    }

    public function testManageTypes()
    {
        $type      = Equipment::IDENTIFIER_WEAPON;
        $equipment = $this->getEquipment();

        $this->assertEmpty($equipment->getTypes());
        $this->assertTrue($equipment->addType($type));
        $this->assertCount(1, $equipment->getTypes());
        $this->assertFalse($equipment->addType($type), "The type should be unique");
        $this->assertCount(1, $equipment->getTypes());

        $this->assertFalse($equipment->removeType("not-found"));
        $this->assertCount(1, $equipment->getTypes());
        $this->assertTrue($equipment->removeType($type));
        $this->assertEmpty($equipment->getTypes());
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

    public function testToStringReturnsTheName()
    {
        $name = uniqid();
        $equipment = $this->getEquipment($name);

        $this->assertSame($name, $equipment->__toString());
    }

    public function testExportReturnsTheTypeForPrintingInAFile()
    {
        $name = uniqid();
        $equipment = $this->getEquipment($name);
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $equipment->addType(Equipment::IDENTIFIER_MASTERWORK);

        $expects = $name . ";Types:" . Equipment::IDENTIFIER_WEAPON . "," . Equipment::IDENTIFIER_MASTERWORK;
        $this->assertSame($expects, $equipment->export());
    }

//     public function testIsMasterwork()
//     {
//         $types = array(
//             Equipment::IDENTIFIER_WEAPON,
//         );
//         $equipment = $this->getEquipment();
//         $equipment->setTypes($types);
//         $this->assertFalse($equipment->isMasterwork(), "The default value should be non masterwork");

//         $types = array(
//             Equipment::IDENTIFIER_MASTERWORK,
//         );
//         $equipment = $this->getEquipment();
//         $equipment->setTypes($types);
//         $this->assertTrue($equipment->isMasterwork(), "The equipment should be masterwork");

//         $types = array(
//             Equipment::IDENTIFIER_MAGIC,
//         );

//         $equipment = $this->getEquipment();
//         $equipment->setTypes($types);
//         $this->assertTrue($equipment->isMasterwork(), "The equipment should be masterwork when magic");
//     }

    public function testTypeShouldBeUnique()
    {
        $equipment = $this->getEquipment();
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $this->assertCount(1, $equipment->getTypes(), "The type should be unique");
    }
}
