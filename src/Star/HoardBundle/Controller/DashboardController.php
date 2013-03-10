<?php

namespace Star\HoardBundle\Controller;

use Star\HoardBundle\Entity\PlayingCharacter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="hoard.dashboard")
     * @Template()
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pcRepos = $entityManager->getRepository(PlayingCharacter::SHORT_NAME);

        return array(
            "characters" => $pcRepos->findAll(),
        );
    }
}
