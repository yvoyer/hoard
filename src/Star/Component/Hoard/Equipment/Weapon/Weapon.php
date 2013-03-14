<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Weapon;

use Star\Component\Hoard\Equipment\Bonus\BonusInterface;
use Star\Component\Hoard\Equipment\Ability\AbilityInterface;

class Weapon
{
    /**
     * @var array
     */
    private $abilities;

    /**
     * @var array
     */
    private $bonuses;

    public function __construct()
    {
        $this->abilities = array();
        $this->bonuses   = array();
    }

    /**
     * Add an ability
     *
     * @param AbilityInterface $ability
     *
     * @return \Star\Component\Hoard\Equipment\Weapon\Weapon
     */
    public function addAbility(AbilityInterface $ability)
    {
        $this->abilities[] = $ability;

        return $this;
    }

    /**
     * Returns the abilities
     *
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Remove the ability
     *
     * @param AbilityInterface $ability
     *
     * @return \Star\Component\Hoard\Equipment\Weapon\Weapon
     */
    public function removeAbility(AbilityInterface $ability)
    {
        $index = array_search($ability, $this->abilities, true);
        if (false !== $index) {
            unset($this->abilities[$index]);
        }

        return $this;
    }

    /**
     * Add a bonus
     *
     * @param BonusInterface $bonus
     *
     * @return \Star\Component\Hoard\Equipment\Weapon\Weapon
     */
    public function addBonus(BonusInterface $bonus)
    {
        $this->bonuses[] = $bonus;

        return $this;
    }

    /**
     * Returns the bonuses
     *
     * @return array
     */
    public function getBonuses()
    {
        return $this->bonuses;
    }

    /**
     * Remove a bonus
     *
     * @param BonusInterface $bonus
     *
     * @return \Star\Component\Hoard\Equipment\Weapon\Weapon
     */
    public function removeBonus(BonusInterface $bonus)
    {
        $index = array_search($bonus, $this->bonuses, true);
        if (false !== $index) {
            unset($this->bonuses[$index]);
        }

        return $this;
    }
}
