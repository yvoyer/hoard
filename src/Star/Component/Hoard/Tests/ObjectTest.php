<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard;

use Star\Component\Hoard\Tests\HoardTestCase;

class ObjectTest extends HoardTestCase
{
    public function getObject(array $args = array())
    {
        return new TestObject($args);
    }

    public function testConstructCanHaveOptionnalArgs()
    {
        $args["name"] = uniqid();
        $object       = $this->getObject($args);

        $this->assertSame($args["name"], $object->name);
    }
}

class TestObject extends Object
{
    public $name;
}