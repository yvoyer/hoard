<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Tests\Functional\Controller;

use Star\HoardBundle\Tests\Functional\FunctionalTestCase;

class ItemControllerTest extends FunctionalTestCase
{
    protected function getDataSet()
    {
        $folder = $this->getFixturesFolder();
        $test = array("WEAPON");

        return $this->getDataSetYml($folder . "/Controller/ItemFixtures.yml");
    }

    public function testListAvailableItem()
    {
        $url     = $this->generateUrl("hoard.item_index");
        $crawler = $this->request($url);

        $this->assertContains("Short Sword", $crawler->filter("body")->text());
    }
}