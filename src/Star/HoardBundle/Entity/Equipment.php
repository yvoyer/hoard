<?php

namespace Star\HoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Star\Component\Hoard\Equipment\Equipment as BaseEquipment;

/**
 * Equipment
 *
 * @ORM\Table(name="hoard_equipment")
 * @ORM\Entity
 */
class Equipment extends BaseEquipment
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
    protected $slug;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    protected $baseCost;

    /**
     * @var array
     *
     * @ORM\Column(name="abilities", type="array")
     */
    protected $types;

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

    /**
     * Set the name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the baseCost
     *
     * @param numeric $baseCost
     */
    public function setBaseCost($baseCost)
    {
        $this->baseCost = $baseCost;

        return $this;
    }
}
