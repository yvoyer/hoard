<?php

namespace Star\HoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayingCharacter
 *
 * @ORM\Table(name="hoard_character")
 * @ORM\Entity()
 */
class PlayingCharacter
{
    const SHORT_NAME = "StarHoardBundle:PlayingCharacter";

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PlayingCharacter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the string representation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->name);
    }
}
