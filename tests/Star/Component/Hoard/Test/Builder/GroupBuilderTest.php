<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Builder;

use Star\Component\Hoard\Builder\GroupBuilder;
use Star\Component\Hoard\Test\HoardTestCase;

class GroupBuilderTest extends HoardTestCase
{
    const INSTANCE_CLASS = "Star\Component\Hoard\Model\Group";

    public function testCreateGroup()
    {
        $builder = $this->getBuilder();
        $group   = $builder->create();

        $this->assertInstanceOf(self::INSTANCE_CLASS, $group);
    }

    /**
     * @return \Star\Component\Hoard\Builder\GroupBuilder
     */
    private function getBuilder()
    {
        return new GroupBuilder(self::INSTANCE_CLASS);
    }
}
