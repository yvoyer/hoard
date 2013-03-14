<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Bonus\Enhancement;

use Star\Component\Hoard\Equipment\Bonus\BonusInterface;

class EnhancementBonus implements BonusInterface
{
    /**
     * The value of the bonus
     *
     * @var integer
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @see \Star\Component\Hoard\Equipment\Bonus\BonusInterface::getValue()
     */
    public function getValue()
    {
        return $this->value;
    }
}
