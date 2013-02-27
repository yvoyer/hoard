<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Builder;

use Star\Component\Hoard\Model\TemplateInterface;

/**
 * A class that builds items.
 *
 * @author Yannick Voyer
 */
class ItemBuilder
{
    /**
     * The class to build
     *
     * @var string
     */
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Create an item from a $template.
     *
     * @param TemplateInterface $template
     *
     * @return \Star\Component\Hoard\Model\ItemInterface
     */
    public function create(TemplateInterface $template = null)
    {
        /**
         * @var $item \Star\Component\Hoard\Model\ItemInterface
         */
        $item = new $this->class();

        if (null !== $template) {
            $item->setName($template->getName());
            $item->setValue($template->getValue());
            $item->setIsMagic($template->isMagic());
        }

        return $item;
    }
}
