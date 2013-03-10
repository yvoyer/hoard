<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Builder;

class GroupBuilder
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
     * Create a group instance
     *
     * @return \Star\Component\Hoard\Model\GroupInterface
     */
    public function create()
    {
        $group = new $this->class();

        return $group;
    }
}
