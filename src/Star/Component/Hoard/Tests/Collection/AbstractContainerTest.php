<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Tests\Collection;

use Star\Component\Hoard\Tests\HoardTestCase;

class AbstractContainerTest extends HoardTestCase
{
    /**
     * @var Star\Component\Hoard\Collection\AbstractContainer
     */
    private $collection;

    public function setUp()
    {
        $this->collection = $this->getMockForAbstractClass("Star\Component\Hoard\Collection\AbstractContainer");
    }

    public function testAddRemove()
    {
        $this->assertCount(0, $this->collection);
        $this->assertTrue($this->collection->add(1));
        $this->assertCount(1, $this->collection);
        $this->assertFalse($this->collection->remove(2));
        $this->assertCount(1, $this->collection);
        $this->assertTrue($this->collection->remove(1));
        $this->assertCount(0, $this->collection);
    }

    public function testClear()
    {
        $this->collection->add(1);
        $this->assertCount(1, $this->collection);
        $this->collection->clear();
        $this->assertCount(0, $this->collection);
    }

    public function testContains()
    {
        $this->collection->add(1);
        $this->assertCount(1, $this->collection);
        $this->assertTrue($this->collection->contains(1));
        $this->assertFalse($this->collection->contains(2));
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->collection->isEmpty());
        $this->collection->add(1);
        $this->assertFalse($this->collection->isEmpty());
    }
}
