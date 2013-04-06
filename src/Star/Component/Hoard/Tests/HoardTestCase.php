<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests;

use Star\Component\Utils\PHPUnit\UnitTestCase;

class HoardTestCase extends UnitTestCase
{
    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockAbility()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Ability\AbilityInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockBonus()
    {
        return $this->getMock("Star\Component\Hoard\Bonus\BonusInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|EnhancementBonus
     */
    protected function getMockEnhancementBonus()
    {
        return $this->getMock("Star\Component\Hoard\Bonus\EnhancementBonus");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEquipment()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Equipment");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEquipmentFactory()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Factory\EquipmentFactoryInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEquipmentType()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Type");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockCraftable()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Craftable");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Star\Component\Hoard\Marker\MarkerInterface
     */
    protected function getMockSaleable()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\Saleable");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockTemplate()
    {
        return $this->getMock("Star\Component\Hoard\Model\Template");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockPlayer()
    {
        return $this->getMock("Star\Component\Hoard\Model\Player");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockInventory()
    {
        return $this->getMock("Star\Component\Hoard\Model\Inventory");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockGroup()
    {
        return $this->getMock("Star\Component\Hoard\Model\Group");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockCharacter()
    {
        return $this->getMock("Star\Component\Hoard\Model\Character");
    }
}
