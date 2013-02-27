<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test;

class HoardTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockItem()
    {
        return $this->getMock("Star\Component\Hoard\Model\ItemInterface");
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
