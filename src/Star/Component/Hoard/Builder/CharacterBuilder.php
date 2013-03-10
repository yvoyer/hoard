<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Builder;

class CharacterBuilder
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
     * Create a character instance
     *
     * @return \Star\Component\Hoard\Model\CharacterInterface
     */
    public function create()
    {
        $character = new $this->class();

        return $character;
    }
}
