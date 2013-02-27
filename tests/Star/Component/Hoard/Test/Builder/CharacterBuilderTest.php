<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Builder;

use Star\Component\Hoard\Builder\CharacterBuilder;
use Star\Component\Hoard\Test\HoardTestCase;

class CharacterBuilderTest extends HoardTestCase
{
    const INSTANCE_CLASS = "Star\Component\Hoard\Model\Character";

    public function testCreateCharacter()
    {
        $builder   = $this->getBuilder();
        $character = $builder->create();

        $this->assertInstanceOf(self::INSTANCE_CLASS, $character);
    }

    /**
     * @return \Star\Component\Hoard\Builder\CharacterBuilder
     */
    private function getBuilder()
    {
        return new CharacterBuilder(self::INSTANCE_CLASS);
    }
}
