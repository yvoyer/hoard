<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Ability\Weapon;

use Star\Component\Hoard\Equipment\Ability\AbilityInterface;

class MasterworkWeaponAbility implements AbilityInterface
{
    public function getValue()
    {
        return 300;
    }
}
