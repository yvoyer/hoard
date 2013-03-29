<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\Component\Hoard\Equipment\Type;

use Star\Component\Hoard\Equipment\Exception\AttributeNotNullableException;

/**
 * @author Yannick Voyer
 *
 * Class defining the types of equipments
 */
class Type
{
    const IDENTIFIER_WEAPON = "WEAPON";
    const IDENTIFIER_MAGIC = "MAGIC";
    const IDENTIFIER_MASTERWORK = "MASTERWORK";

    /**
     * The name of the type
     *
     * @var string
     */
    private $name;

    /**
     * The identifiers
     *
     * @var array of identifiers
     */
    private $identifiers = array();

    public function __construct($name = null, array $identifiers = array())
    {
        $this->name = $name;
        foreach ($identifiers as $identifier) {
            $this->addIdentifier($identifier);
        }
    }

    /**
     * Returns the string representation of the type
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Returns the exported version for printing in a file
     *
     * @return string
     */
    public function export()
    {
        // @todo Move to a decorator
        return "Type:" . implode(",", $this->identifiers);
    }

    /**
     * Returns the name of the type
     *
     * @return string
     */
    public function getName()
    {
        if (empty($this->name)) {
            throw new AttributeNotNullableException("name");
        }

        return $this->name;
    }

    /**
     * Add an identifier on the type
     *
     * @param string $identifier
     */
    private function addIdentifier($identifier)
    {
        $this->identifiers[$identifier] = $identifier;
    }

    /**
     * Returns the identifiers
     *
     * @return array
     */
    public function getIdentifiers()
    {
        if (empty($this->identifiers)) {
            throw new AttributeNotNullableException("identifiers");
        }

        return array_values($this->identifiers);
    }

    /**
     * Returns whether the $identifier is present in the collection
     *
     * @param string $identifier
     *
     * @return bool
     */
    private function hasIdentifier($identifier)
    {
        return array_key_exists($identifier, $this->identifiers);
    }

    /**
     * Retruns whether the type is magical
     *
     * @return bool
     */
    public function isMagic()
    {
        return $this->hasIdentifier(self::IDENTIFIER_MAGIC);
    }

    /**
     * Retruns whether the type is masterwork
     *
     * @return bool
     */
    public function isMasterwork()
    {
        return $this->hasIdentifier(self::IDENTIFIER_MASTERWORK) || $this->isMagic();
    }
}
