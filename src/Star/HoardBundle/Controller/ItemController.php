<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Controller;

use Star\HoardBundle\Form\Equipment\UpdateType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Star\HoardBundle\Entity\Equipment;
use Star\HoardBundle\Form\Equipment\CreateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $entityManager  = $this->getDoctrine()->getManager();
        $itemRepository = $entityManager->getRepository(Equipment::SHORT_NAME);
        $items          = $itemRepository->findAll();

        return array(
            "items" => $items,
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

    /**
     * Displays a form to edit an existing Equipment entity.
     *
     * @Route("/{id}/edit", name="hoard.item_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $equipment = $em->getRepository('StarHoardBundle:Equipment')->find($id);

        if (!$equipment) {
            throw $this->createNotFoundException('Unable to find Equipment entity.');
        }

        $editForm = $this->createForm(new UpdateType(), $equipment);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $equipment,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Equipment entity.
     *
     * @Route("/{id}", name="hoard.item_update")
     * @Method("PUT")
     * @Template("StarHoardBundle:Equipment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $equipment = $em->getRepository('StarHoardBundle:Equipment')->find($id);

        if (!$equipment) {
            throw $this->createNotFoundException('Unable to find Equipment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UpdateType(), $equipment);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($equipment);
            $em->flush();

            return $this->redirect($this->generateUrl('hoard.item_edit', array('id' => $equipment->getId())));
        }

        return array(
            'entity'      => $equipment,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Equipment entity.
     *
     * @Route("/{id}", name="hoard.item_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StarHoardBundle:Equipment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Equipment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hoard.item_index'));
    }

    /**
     * Creates a form to delete a Equipment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
