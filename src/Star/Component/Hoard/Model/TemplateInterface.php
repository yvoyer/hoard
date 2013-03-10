<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Model;

/**
 * An object that serves as a template for an item
 *
 * @author Yannick Voyer
 */
interface TemplateInterface
{
    /**
     * Returns the name
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the value
     *
     * @return float
     */
    public function getValue();

    /**
     * Returns whether the item is magic
     *
     * @return boolean
     */
    public function IsMagic();
}