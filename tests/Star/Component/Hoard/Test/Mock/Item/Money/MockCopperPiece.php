<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Test\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockCopperPiece extends Item
{
    protected $name = "Copper Piece";
    protected $value = .01;
    protected $isMagic = false;
}
