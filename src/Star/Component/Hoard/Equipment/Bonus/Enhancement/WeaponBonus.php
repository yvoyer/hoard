<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Bonus\Enhancement;

use Star\Component\Hoard\Equipment\Bonus\EnhancementBonus;
use Star\Component\Hoard\Equipment\Bonus\ValueBonus;

class WeaponBonus extends EnhancementBonus implements ValueBonus
{
    private $value;

    public function __construct($bonus, $value)
    {
        parent::__construct($bonus);

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}
