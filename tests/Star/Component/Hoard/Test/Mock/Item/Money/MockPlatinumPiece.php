<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Test\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockPlatinumPiece extends Item
{
    protected $name = "Platinum Piece";
    protected $value = 10;
    protected $isMagic = false;
}
