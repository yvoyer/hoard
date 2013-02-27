<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Test\Model;

use Star\Component\Hoard\Model\Character;
use Star\Component\Hoard\Model\ItemInterface;
use Star\Component\Hoard\Test\Mock\Item\Money\MockPlatinumPiece;
use Star\Component\Hoard\Test\Mock\Item\Money\MockTradeBar;
use Star\Component\Hoard\Test\Mock\Item\Money\MockGem;
use Star\Component\Hoard\Test\Mock\Item\Money\MockElectrumPiece;
use Star\Component\Hoard\Test\Mock\Item\Money\MockGoldPiece;
use Star\Component\Hoard\Test\Mock\Item\Money\MockSilverPiece;
use Star\Component\Hoard\Test\Mock\Item\Money\MockCopperPiece;
use Star\Component\Hoard\Test\HoardTestCase;

class CharacterTest extends HoardTestCase
{
    /**
     * @var \Star\Component\Hoard\Model\Character
     */
    private $character;

    public function setUp()
    {
        $this->character = new Character();
    }

    public function testInventory()
    {
        $this->assertInventory(0, 0);

        $copperPiece = new MockCopperPiece();
        $this->character->addItem($copperPiece);
        $this->assertInventory(1, 0.01);

        $silverPiece = new MockSilverPiece();
        $this->character->addItem($silverPiece);
        $this->assertInventory(2, 0.11);

        $goldPiece = new MockGoldPiece();
        $this->character->addItem($goldPiece);
        $this->assertInventory(3, 1.11);

        $electrumPiece = new MockElectrumPiece();
        $this->character->addItem($electrumPiece);
        $this->assertInventory(4, 3.11);

        $platinumPiece = new MockPlatinumPiece();
        $this->character->addItem($platinumPiece);
        $this->assertInventory(5, 13.11);

        $gem = new MockGem();
        $this->character->addItem($gem);
        $this->assertInventory(6, 1013.11);

        $tradeBar = new MockTradeBar();
        $this->character->addItem($tradeBar);
        $this->assertInventory(7, 1513.11);

        $this->character->removeItem($tradeBar);
        $this->assertInventory(6, 1013.11);
        $this->character->removeItem($gem);
        $this->assertInventory(5, 13.11);
        $this->character->removeItem($platinumPiece);
        $this->assertInventory(4, 3.11);
        $this->character->removeItem($electrumPiece);
        $this->assertInventory(3, 1.11);
        $this->character->removeItem($goldPiece);
        $this->assertInventory(2, 0.11);
        $this->character->removeItem($silverPiece);
        $this->assertInventory(1, 0.01);
        $this->character->removeItem($copperPiece);
        $this->assertInventory(0, 0.0);
    }

    protected function assertInventory($itemCount, $totalValue)
    {
        $this->assertCount($itemCount, $this->character->getItems());
        $this->assertSame($totalValue, $this->character->getTotalWealth());
    }
}
