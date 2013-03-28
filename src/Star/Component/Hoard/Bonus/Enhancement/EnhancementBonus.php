<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Bonus\Enhancement;

use Star\Component\Hoard\Bonus\BonusInterface;

class EnhancementBonus implements BonusInterface
{
    /**
     * The plus of the bonus
     *
     * @var integer
     */
    private $plus;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @see \Star\Component\Hoard\Equipment\Bonus\BonusInterface::getPlus()
     */
    public function getPlus()
    {
        return $this->value;
    }
}
