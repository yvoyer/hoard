<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Tests\Mock\Item\Money;

use Star\Component\Hoard\Model\Item;

class MockElectrumPiece extends Item
{
    protected $name = "Electrum Piece";
    protected $value = 2;
    protected $isMagic = false;
}
