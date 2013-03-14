<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Ability\Weapon;

use Star\Component\Hoard\Equipment\Bonus\Enhancement\WeaponBonus;
use Star\Component\Hoard\Equipment\Bonus\EnhancementBonus;

class MagicWeaponAbility extends MasterworkWeaponAbility
{
    /**
     * @var \Star\Component\Hoard\Equipment\Bonus\EnhancementBonus
     */
    private $enhancement;

    public function __construct(WeaponBonus $enhancement)
    {
        $this->enhancement = $enhancement;
    }

    public function getEnhancementBonus()
    {
        return $this->enhancement->getBonus();
    }

    /**
     * Returns the value for the bonus
     *
     * @return float
     */
    public function getValue()
    {
        $value = parent::getValue();
        $value += $this->enhancement->getValue();

        return $value;
    }
}
