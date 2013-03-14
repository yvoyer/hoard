<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Tests\Equipment\Weapon;

use Star\Component\Hoard\Equipment\Weapon\Weapon;

use Star\Component\Hoard\Tests\HoardTestCase;

class WeaponTest extends HoardTestCase
{
    /**
     * @return \Star\Component\Hoard\Equipment\Weapon\Weapon
     */
    private function getWeapon()
    {
        return new Weapon();
    }

    public function testManageAbility()
    {
        $weapon  = $this->getWeapon();
        $ability = $this->getMockAbility();

        $this->assertCount(0, $weapon->getAbilities());
        $this->assertSame($weapon, $weapon->addAbility($ability));
        $this->assertCount(1, $weapon->getAbilities());
        $this->assertSame($weapon, $weapon->removeAbility($ability));
        $this->assertCount(0, $weapon->getAbilities());
    }

    public function testManageBonus()
    {
        $weapon = $this->getWeapon();
        $bonus  = $this->getMockBonus();

        $this->assertCount(0, $weapon->getBonuses());
        $this->assertSame($weapon, $weapon->addBonus($bonus));
        $this->assertCount(1, $weapon->getBonuses());
        $this->assertSame($weapon, $weapon->removeBonus($bonus));
        $this->assertCount(0, $weapon->getBonuses());
    }
}