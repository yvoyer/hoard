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
    public function getType($name = null, array $identifiers = array())
    {
        return new Type($name, $identifiers);
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
        $expectedValue = uniqid();

        $type = $this->getType($expectedValue);
        $this->assertSame($expectedValue, $type->getName());
    }

    /**
     * @expectedException        Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException
     * @expectedExceptionMessage The attribute 'identifiers' can't be null.
     */
    public function testIdentifiersCantBeNullable()
    {
        $this->getType()->getIdentifiers();
    }

    public function testGetIdentifierReturnsTheInternalsValues()
    {
        $identifiers = array(
            uniqid(),
        );

        $type = $this->getType(null, $identifiers);
        $this->assertSame($identifiers, $type->getIdentifiers());
    }

    public function testToStringReturnsTheName()
    {
        $name = uniqid();
        $type = $this->getType($name);

        $this->assertSame($name, $type->__toString());
    }

    public function testExportReturnsTheTypeForPrintingInAFile()
    {
        $name = uniqid();
        $identifiers = array(
            Type::IDENTIFIER_WEAPON,
            Type::IDENTIFIER_MASTERWORK,
        );
        $type = $this->getType($name, $identifiers);

        $expects = "Type:" . implode(",", $identifiers);
        $this->assertSame($expects, $type->export());
    }

    public function testIsMagic()
    {
        $identifiers = array(
            Type::IDENTIFIER_WEAPON,
        );
        $type = $this->getType(null, $identifiers);
        $this->assertFalse($type->isMagic(), "The default value should be non magical");

        $identifiers = array(
            Type::IDENTIFIER_MAGIC,
        );
        $type = $this->getType(null, $identifiers);
        $this->assertTrue($type->isMagic(), "The equipment should be magical");
    }

    public function testIsMasterwork()
    {
        $identifiers = array(
            Type::IDENTIFIER_WEAPON,
        );
        $type = $this->getType(null, $identifiers);
        $this->assertFalse($type->isMasterwork(), "The default value should be non masterwork");

        $identifiers = array(
            Type::IDENTIFIER_MASTERWORK,
        );
        $type = $this->getType(null, $identifiers);
        $this->assertTrue($type->isMasterwork(), "The equipment should be masterwork");

        $identifiers = array(
            Type::IDENTIFIER_MAGIC,
        );
        $type = $this->getType(null, $identifiers);
        $this->assertTrue($type->isMasterwork(), "The equipment should be masterwork when magic");
    }

    public function testIdentifiersShouldBeUnique()
    {
        $identifiers = array(
            Type::IDENTIFIER_WEAPON,
            Type::IDENTIFIER_WEAPON,
        );
        $expects = array(
            Type::IDENTIFIER_WEAPON,
        );

        $type = $this->getType(null, $identifiers);
        $this->assertSame($expects, $type->getIdentifiers(), "The identifiers should be unique");
    }
}