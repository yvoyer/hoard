<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Test\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockGem extends Item
{
    protected $name = "Gem";
    protected $value = 1000;
    protected $isMagic = false;
}
