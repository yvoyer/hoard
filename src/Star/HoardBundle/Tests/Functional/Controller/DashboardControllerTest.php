<?php

namespace Star\HoardBundle\Tests\Functional\Controller;

use Star\HoardBundle\Tests\Functional\FunctionalTestCase;

class DashboardControllerTest extends FunctionalTestCase
{
    protected function getDataSet()
    {
        $folder = $this->getFixturesFolder();

        return $this->getDataSetYml($folder . "/Controller/CharacterFixtures.yml");
    }

    public function testPlayerCanSeeTheCharacterList()
    {
        $url     = $this->generateUrl("hoard.dashboard");
        $crawler = $this->request($url);

        $this->assertContains("Character 1", $crawler->filter("body")->text());
    }
}
