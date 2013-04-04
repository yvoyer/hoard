<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Equipment;

use Star\Component\Hoard\Equipment\Ability\AbilityInterface;
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
    private function getEquipment(array $args = array())
    {
        return new Equipment($args);
    }

    public function testGetBaseCost()
    {
        $options = array(
            "baseCost" => 15,
        );

        $equipment = $this->getEquipment($options);
        $this->assertSame(15, $equipment->getBaseCost());
    }

    public function testManageAbility()
    {
        $equipment       = $this->getEquipment();
        $ability         = $this->getMockAbility();
        $notFoundAbility = $this->getMockAbility();

        $this->assertEmpty($equipment->getAbilities());
        $this->assertTrue($equipment->addAbility($ability));
        $this->assertCount(1, $equipment->getAbilities());
        $this->assertFalse($equipment->removeAbility($notFoundAbility));
        $this->assertCount(1, $equipment->getAbilities());
        $this->assertTrue($equipment->removeAbility($ability));
        $this->assertEmpty($equipment->getAbilities());
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
        $options = array(
            "name" => "Short Sword",
        );
        $equipment = $this->getEquipment($options);
        $this->assertSame($options["name"], $equipment->getName());
    }

    public function testSetGetType()
    {
        $equipment = $this->getEquipment();
        $types     = array(Equipment::IDENTIFIER_WEAPON);
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
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
        $options = array(
            "baseCost" => 15,
        );
        $equipment = $this->getEquipment($options);

        $abilityOneCost = 300;
        $abilityOne = $this->getMockAbility();
        $abilityOne->expects($this->once())
            ->method("getCost")
            ->will($this->returnValue($abilityOneCost));
        $equipment->addAbility($abilityOne);

        $abilityTwoCost = 2000;
        $abilityTwo = $this->getMockAbility();
        $abilityTwo->expects($this->once())
            ->method("getCost")
            ->will($this->returnValue($abilityTwoCost));
        $equipment->addAbility($abilityTwo);

        $this->assertSame(
            2315,
            $equipment->getCost(),
            "The equipment cost should be changed based on abilities"
        );
    }

    public function testToStringReturnsTheName()
    {
        $options = array(
            "name" => uniqid(),
        );
        $equipment = $this->getEquipment($options);

        $this->assertSame($options["name"], $equipment->__toString());
    }

    public function testExportReturnsTheTypeForPrintingInAFile()
    {
        $options = array(
            "name" => uniqid(),
        );

        $equipment = $this->getEquipment($options);
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $equipment->addType(Equipment::IDENTIFIER_MASTERWORK);

        $expects = $options["name"] . ";Types:" . Equipment::IDENTIFIER_WEAPON . "," . Equipment::IDENTIFIER_MASTERWORK;
        $this->assertSame($expects, $equipment->export());
    }

    public function testTypeShouldBeUnique()
    {
        $equipment = $this->getEquipment();
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $equipment->addType(Equipment::IDENTIFIER_WEAPON);
        $this->assertCount(1, $equipment->getTypes(), "The type should be unique");
    }
}
