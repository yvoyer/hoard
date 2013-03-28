<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Bonus\Enhancement;

use Star\Component\Hoard\Bonus\EnhancementBonus;
use Star\Component\Hoard\Bonus\ValueBonus;

class WeaponBonus extends EnhancementBonus implements ValueBonus
{
    private $value;

    public function __construct($plus, $value)
    {
        parent::__construct($plus);

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
