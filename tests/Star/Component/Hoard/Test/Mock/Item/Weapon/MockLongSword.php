<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Mock\Item\Weapon;

use Star\Component\Hoard\Model\Item;

class MockLongSword extends Item
{
    protected $name = "Long sword";
    protected $price = 20;
    protected $isMagic = false;
}
