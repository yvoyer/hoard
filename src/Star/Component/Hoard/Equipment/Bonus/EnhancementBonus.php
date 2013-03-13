<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Bonus;

class EnhancementBonus
{
    private $bonus;

    public function __construct($bonus)
    {
        $this->bonus = $bonus;
    }

    public function getBonus()
    {
        return $this->bonus;
    }

}