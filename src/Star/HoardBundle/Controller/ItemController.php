<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Star\HoardBundle\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Yannick Voyer
 *
 * @Route("item/")
 */
class ItemController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $itemRepository = $entityManager->getRepository(Equipment::SHORT_NAME);

        return array(
            "items" => $itemRepository->findAll(),
        );
    }
}
