<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Tests\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockTradeBar extends Item
{
    protected $name = "Trade Bar";
    protected $value = 500;
    protected $isMagic = false;
}
