<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

class MagicType extends MasterworkType
{
    private $bonus;

    public function __construct($bonus)
    {
        parent::__construct();

        $this->addType("MAGIC");
        $this->bonus = $bonus;
    }

    /**
     * Returns the cost of the equipment
     *
     * @return float
     */
    public function getCost()
    {
        $value = parent::getValue();

        return ($value + ($this->bonus * 2000));
    }
}
