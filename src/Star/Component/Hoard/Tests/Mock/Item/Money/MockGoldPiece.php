<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Tests\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockGoldPiece extends Item
{
    protected $name = "Gold Piece";
    protected $value = 1;
    protected $isMagic = false;
}
