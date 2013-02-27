<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Model;

/**
 * A character
 *
 * @author Yannick Voyer
 */
interface CharacterInterface
{
    /**
     * Add an $item to the character's inventory
     *
     * @param ItemInterface $item
     *
     * @return boolean Always return true
     */
    public function addItem(ItemInterface $item);

    /**
     * Returns the inventory of items
     *
     * @return array
     */
    public function getItems();

    /**
     * Remove an $item from the character's inventory
     *
     * @param ItemInterface $item
     *
     * @return boolean Whether the character has the item removed from the inventory
     */
    public function removeItem(ItemInterface $item);
}