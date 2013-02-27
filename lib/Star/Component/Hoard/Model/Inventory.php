<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Model;

use Star\Component\Hoard\Collection\AbstractContainer;

/**
 * A inventory object
 *
 * @author Yannick Voyer
 */
class Inventory extends AbstractContainer implements InventoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }
}
