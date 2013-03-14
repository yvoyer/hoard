<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests;

class HoardTestCase extends \PHPUnit_Framework_TestCase
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
        return $this->getMock("Star\Component\Hoard\Equipment\Bonus\BonusInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEquipment()
    {
        return $this->getMock("Star\Component\Hoard\Equipment\EquipmentInterface");
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
    protected function getMockItem()
    {
        return $this->getMock("Star\Component\Hoard\Model\ItemInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Star\Component\Hoard\Marker\MarkerInterface
     */
    protected function getMockMarker()
    {
        return $this->getMock("Star\Component\Hoard\Marker\MarkerInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockTemplate()
    {
        return $this->getMock("Star\Component\Hoard\Model\TemplateInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockPlayer()
    {
        return $this->getMock("Star\Component\Hoard\Model\PlayerInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockInventory()
    {
        return $this->getMock("Star\Component\Hoard\Model\InventoryInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockGroup()
    {
        return $this->getMock("Star\Component\Hoard\Model\GroupInterface");
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockCharacter()
    {
        return $this->getMock("Star\Component\Hoard\Model\CharacterInterface");
    }
}
