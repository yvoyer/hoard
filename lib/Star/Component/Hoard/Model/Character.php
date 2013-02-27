<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Model;

use Star\Component\Hoard\Exception\InvalidMoneyTypeException;

/**
 * A character object
 *
 * @author Yannick Voyer
 */
class Character implements CharacterInterface
{
    /**
     * The collection of items
     *
     * @var Inventory
     */
    protected $inventory;

    /**
     * The character's total wealth (Including all item's value)
     *
     * @var float
     */
    protected $totalWealth;

    public function __construct()
    {
        $this->inventory = new Inventory();
        $this->totalWealth = 0;
    }

    /**
     * Returns the character's total wealth
     *
     * @return float
     */
    public function getTotalWealth()
    {
        return $this->totalWealth;
    }

    /**
     * @see \Star\Component\Hoard\Model\CharacterInterface::addItem()
     */
    public function addItem(ItemInterface $item)
    {
        $this->totalWealth += $item->getValue();

        return $this->inventory->add($item);
    }

    /**
     * @see \Star\Component\Hoard\Model\CharacterInterface::getInventory()
     */
    public function getItems()
    {
        return $this->inventory->toArray();
    }

    /**
     * @see \Star\Component\Hoard\Model\CharacterInterface::removeItem()
     */
    public function removeItem(ItemInterface $item)
    {
        $success = $this->inventory->remove($item);
        if ($success) {
            $newWealth = $this->totalWealth - $item->getValue();
            $this->totalWealth = floatval(number_format($newWealth, "2", ".", ""));
        }

        return $success;
    }
}
