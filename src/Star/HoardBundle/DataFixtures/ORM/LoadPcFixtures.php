<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\DataFixtures\ORM;

use Star\HoardBundle\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Star\HoardBundle\Entity\PlayingCharacter;

class LoadPcFixtures extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $pc = new PlayingCharacter();
        $pc->setName('Character 1');

        $manager->persist($pc);
        $manager->flush();
    }
}