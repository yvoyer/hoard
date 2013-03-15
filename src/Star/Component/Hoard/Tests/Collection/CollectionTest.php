<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Collection;

use Star\Component\Hoard\Collection\Collection;
use Star\Component\Hoard\Tests\HoardTestCase;

class CollectionTest extends HoardTestCase
{
    /**
     * @param array $argument
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getCollection($argument = array())
    {
        return new Collection($argument);
    }

    public function testAddRemove()
    {
        $collection = $this->getCollection();
        $this->assertCount(0, $collection);
        $this->assertTrue($collection->add(1));
        $this->assertCount(1, $collection);
        $this->assertFalse($collection->remove(2));
        $this->assertCount(1, $collection);
        $this->assertTrue($collection->remove(1));
        $this->assertCount(0, $collection);
    }

    public function testClear()
    {
        $collection = $this->getCollection();
        $collection->add(1);
        $this->assertCount(1, $collection);
        $collection->clear();
        $this->assertCount(0, $collection);
    }

    public function testContains()
    {
        $collection = $this->getCollection();
        $collection->add(1);
        $this->assertCount(1, $collection);
        $this->assertTrue($collection->contains(1));
        $this->assertFalse($collection->contains(2));
    }

    public function testIsEmpty()
    {
        $collection = $this->getCollection();
        $this->assertTrue($collection->isEmpty());
        $collection->add(1);
        $this->assertFalse($collection->isEmpty());
    }

    public function testToArray()
    {
        $argument = array(
            1 => "test",
        );
        $collection = $this->getCollection($argument);
        $this->assertSame($argument, $collection->toArray());
    }
}
