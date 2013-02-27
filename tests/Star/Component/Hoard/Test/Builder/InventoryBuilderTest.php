<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Builder;

use Star\Component\Hoard\Builder\InventoryBuilder;
use Star\Component\Hoard\Test\HoardTestCase;

class InventoryBuilderTest extends HoardTestCase
{
    const INSTANCE_CLASS = "Star\Component\Hoard\Model\Inventory";

    public function testCreateInventory()
    {
        $builder   = $this->getBuilder();
        $inventory = $builder->create();

        $this->assertInstanceOf(self::INSTANCE_CLASS, $inventory);
    }


    /**
     * @return \Star\Component\Hoard\Builder\InventoryBuilder
     */
    private function getBuilder()
    {
        return new InventoryBuilder(self::INSTANCE_CLASS);
    }
}
