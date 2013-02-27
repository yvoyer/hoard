<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Calendar Component
 */

namespace Star\Component\Hoard\Collection;

abstract class AbstractContainer implements ObjectCollection
{
    /**
    * An array containing the entries of this collection.
    *
    * @var array
    */
    private $_elements;

    /**
    * Initializes a new ArrayCollection.
    *
    * @param array $elements
    */
    public function __construct(array $elements = array())
    {
        $this->_elements = $elements;
    }

    /**
    * {@inheritDoc}
    */
    public function toArray()
    {
        return $this->_elements;
    }

    /**
    * {@inheritDoc}
    */
    public function remove($element)
    {
        $key = array_search($element, $this->_elements, true);

        if ($key !== false) {
            unset($this->_elements[$key]);

            return true;
        }

        return false;
    }

    /**
    * {@inheritDoc}
    */
    public function contains($element)
    {
        return in_array($element, $this->_elements, true);
    }

    /**
    * {@inheritDoc}
    */
    public function count()
    {
        return count($this->_elements);
    }

    /**
    * {@inheritDoc}
    */
    public function add($value)
    {
        $this->_elements[] = $value;

        return true;
    }

    /**
    * {@inheritDoc}
    */
    public function isEmpty()
    {
        return empty($this->_elements);
    }

    /**
    * {@inheritDoc}
    */
    public function clear()
    {
        $this->_elements = array();
    }
}




