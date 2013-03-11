<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Star\HoardBundle\Form\Equipment\CreateType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Star\HoardBundle\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author Yannick Voyer
 *
 * @Route("/item")
 */
class ItemController extends Controller
{
    /**
     * @Route("/", name="hoard.item_index")
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

    /**
     * @Route("/new", name="hoard.item_new")
     * @Template()
     */
    public function newAction()
    {
        $equipment = new Equipment();
        $form      = $this->createForm(new CreateType(), $equipment);

        return array(
            "form" => $form->createView(),
        );
    }

    /**
     * Creates a new Equipment entity.
     *
     * @Route("/create", name="hoard.item_create")
     * @Method("POST")
     * @Template("StarHoardBundle:Item:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $equipment = new Equipment();
        $form = $this->createForm(new CreateType(), $equipment);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipment);
            $em->flush();

            return $this->redirect($this->generateUrl('hoard.item_index', array('id' => $equipment->getId())));
        }

        return array(
            'entity' => $equipment,
            'form'   => $form->createView(),
        );
    }
}
