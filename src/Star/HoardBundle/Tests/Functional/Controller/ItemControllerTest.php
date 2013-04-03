<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Tests\Functional\Controller;

use Star\HoardBundle\Tests\Functional\FunctionalTestCase;

class ItemControllerTest extends FunctionalTestCase
{
    public function testListAvailableItem()
    {
        $url = $this->generateUrl("hoard.item_index");
        $this->request($url);

        $this->debugPage();
    }
}