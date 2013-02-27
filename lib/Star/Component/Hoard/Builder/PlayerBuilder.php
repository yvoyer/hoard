<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Builder;

class PlayerBuilder
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
     * Create a player instance
     *
     * @return \Star\Component\Hoard\Model\PlayerInterface
     */
    public function create()
    {
        $player = new $this->class();

        return $player;
    }
}
