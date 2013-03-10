<?php

namespace Star\HoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Star\Component\Hoard\Equipment\Item;

/**
 * Equipment
 *
 * @ORM\Table(name="hoard_equipment")
 * @ORM\Entity
 */
class Equipment extends Item
{
    const SHORT_NAME = "StarHoardBundle:Equipment";

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
    protected $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true)
     */
    private $slug;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    protected $value;

    /**
     * @var array
     *
     * @ORM\Column(name="abilities", type="array")
     */
    protected $abilities;

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
     * Set abilities
     *
     * @param array $abilities
     * @return Equipment
     */
    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;

        return $this;
    }

    /**
     * Get abilities
     *
     * @return array
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Equipment
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
