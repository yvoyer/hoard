<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Tests\Behavior\Equipment;

use Star\Component\Hoard\Equipment\Bonus\Enhancement\WeaponBonus;
use Star\Component\Hoard\Equipment\Bonus\EnhancementBonus;
use Star\Component\Hoard\Equipment\Ability\MagicAbility;
use Star\Component\Hoard\Equipment\Ability\Weapon\MasterworkWeaponAbility;
use Star\Component\Hoard\Equipment\Ability\Weapon\MagicWeaponAbility;
use Star\HoardBundle\Entity\Equipment;
use Star\HoardBundle\Tests\Behavior\BehaviorTestCase;

class ItemCreationBehaviorTest extends BehaviorTestCase
{
    const GIVEN_NEW_ITEM = "New Item";

    const WHEN_ADD_MAGIC_BONUS = "I add the magic bonus";
    const WHEN_ADD_MASTERWORK = "I add masterwork type";

    const THEN_VALUE_EQUALS = "Value should be";

    /**
     * @scenario
     */
    public function basicItemsHaveNoSpecialAbilitites()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->then(self::THEN_VALUE_EQUALS, 15);
    }

    /**
     * @scenario
     */
    public function masterworkItemAdd300gpValue()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MASTERWORK)
            ->then(self::THEN_VALUE_EQUALS, 315);
    }

    /**
     * @scenario
     */
    public function plus1MagicWeaponAdd2000gp()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MAGIC_BONUS, "1", 2000)
            ->then(self::THEN_VALUE_EQUALS, 2315);
    }

    /**
     * @scenario
     */
    public function plus2MagicWeaponAdd8000gp()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MAGIC_BONUS, "2", 8000)
            ->then(self::THEN_VALUE_EQUALS, 8315);
    }

    /**
     * @scenario
     */
    public function plus3MagicWeaponAdd18000gp()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MAGIC_BONUS, "3", 18000)
            ->then(self::THEN_VALUE_EQUALS, 18315);
    }

    /**
     * @scenario
     */
    public function plus4MagicWeaponAdd32000gp()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MAGIC_BONUS, "4", 32000)
            ->then(self::THEN_VALUE_EQUALS, 32315);
    }

    /**
     * @scenario
     */
    public function plus5MagicWeaponAdd50000gp()
    {
        $this->given(self::GIVEN_NEW_ITEM)
            ->when(self::WHEN_ADD_MAGIC_BONUS, "5", 50000)
            ->then(self::THEN_VALUE_EQUALS, 50315);
    }

    public function runGiven(&$world, $action, $arguments)
    {
        switch ($action) {
            case self::GIVEN_NEW_ITEM:
                $equipment = new Equipment();
                $equipment->setName("Short Sword");
                $equipment->setValue(15);
                $world["item"] = $equipment;
                break;

            default:
                $this->notImplemented($action);
        }
    }

    public function runWhen(&$world, $action, $arguments)
    {
        switch ($action) {
            case self::WHEN_ADD_MAGIC_BONUS:
                $weaponBonus = new WeaponBonus($arguments[0], $arguments[1]);
                $world["item"]->addAbility(new EnhanMagicWeaponAbility($weaponBonus));
                break;

            case self::WHEN_ADD_MASTERWORK:
                $world["item"]->addAbility(new MasterworkWeaponAbility());
                break;

            default:
                $this->notImplemented($action);
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch ($action) {
            case self::THEN_VALUE_EQUALS:
                $this->assertSame($arguments[0], $world["item"]->getValue());
                break;

            default:
                $this->notImplemented($action);
        }
    }
}
