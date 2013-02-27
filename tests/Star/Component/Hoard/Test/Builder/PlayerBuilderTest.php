<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Builder;

use Star\Component\Hoard\Builder\PlayerBuilder;
use Star\Component\Hoard\Test\HoardTestCase;

class PlayerBuilderTest extends HoardTestCase
{
    const INSTANCE_CLASS = "Star\Component\Hoard\Model\Player";

    public function testCreatePlayer()
    {
        $builder = $this->getBuilder();
        $player  = $builder->create();

        $this->assertInstanceOf(self::INSTANCE_CLASS, $player);
    }

    /**
     * @return \Star\Component\Hoard\Builder\PlayerBuilder
     */
    private function getBuilder()
    {
        return new PlayerBuilder(self::INSTANCE_CLASS);
    }
}
