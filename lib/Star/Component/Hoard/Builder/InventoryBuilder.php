<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Builder;

class InventoryBuilder
{
    /**
     * The class to build
     *
     * @var string
     */
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Create a inventory instance
     *
     * @return \Star\Component\Hoard\Model\InventoryInterface
     */
    public function create()
    {
        $inventory = new $this->class();

        return $inventory;
    }
}
