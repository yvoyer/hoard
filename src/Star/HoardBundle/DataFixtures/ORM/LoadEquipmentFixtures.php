<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\DataFixtures\ORM;

use Star\HoardBundle\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Star\HoardBundle\Entity\Equipment;

class LoadEquipmentFixtures extends AbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $item = new Equipment();
        $item->setName('Short Sword');
        $item->setValue(15);

        $manager->persist($item);
        $manager->flush();
    }
}