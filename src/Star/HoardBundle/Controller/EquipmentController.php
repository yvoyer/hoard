<?php

// namespace Star\HoardBundle\Controller;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
// use Star\HoardBundle\Entity\Equipment;
// use Star\HoardBundle\Form\EquipmentType;

// /**
//  * Equipment controller.
//  *
//  * @Route("/equipment")
//  */
// class EquipmentController extends Controller
// {
//     /**
//      * Lists all Equipment entities.
//      *
//      * @Route("/", name="equipment")
//      * @Method("GET")
//      * @Template()
//      */
//     public function indexAction()
//     {
//         $em = $this->getDoctrine()->getManager();

//         $entities = $em->getRepository('StarHoardBundle:Equipment')->findAll();

//         return array(
//             'entities' => $entities,
//         );
//     }

//     /**
//      * Creates a new Equipment entity.
//      *
//      * @Route("/", name="equipment_create")
//      * @Method("POST")
//      * @Template("StarHoardBundle:Equipment:new.html.twig")
//      */
//     public function createAction(Request $request)
//     {
//         $entity  = new Equipment();
//         $form = $this->createForm(new EquipmentType(), $entity);
//         $form->bind($request);

//         if ($form->isValid()) {
//             $em = $this->getDoctrine()->getManager();
//             $em->persist($entity);
//             $em->flush();

//             return $this->redirect($this->generateUrl('equipment_show', array('id' => $entity->getId())));
//         }

//         return array(
//             'entity' => $entity,
//             'form'   => $form->createView(),
//         );
//     }

//     /**
//      * Displays a form to create a new Equipment entity.
//      *
//      * @Route("/new", name="equipment_new")
//      * @Method("GET")
//      * @Template()
//      */
//     public function newAction()
//     {
//         $entity = new Equipment();
//         $form   = $this->createForm(new EquipmentType(), $entity);

//         return array(
//             'entity' => $entity,
//             'form'   => $form->createView(),
//         );
//     }

//     /**
//      * Finds and displays a Equipment entity.
//      *
//      * @Route("/{id}", name="equipment_show")
//      * @Method("GET")
//      * @Template()
//      */
//     public function showAction($id)
//     {
//         $em = $this->getDoctrine()->getManager();

//         $entity = $em->getRepository('StarHoardBundle:Equipment')->find($id);

//         if (!$entity) {
//             throw $this->createNotFoundException('Unable to find Equipment entity.');
//         }

//         $deleteForm = $this->createDeleteForm($id);

//         return array(
//             'entity'      => $entity,
//             'delete_form' => $deleteForm->createView(),
//         );
//     }

//     /**
//      * Displays a form to edit an existing Equipment entity.
//      *
//      * @Route("/{id}/edit", name="equipment_edit")
//      * @Method("GET")
//      * @Template()
//      */
//     public function editAction($id)
//     {
//         $em = $this->getDoctrine()->getManager();

//         $entity = $em->getRepository('StarHoardBundle:Equipment')->find($id);

//         if (!$entity) {
//             throw $this->createNotFoundException('Unable to find Equipment entity.');
//         }

//         $editForm = $this->createForm(new EquipmentType(), $entity);
//         $deleteForm = $this->createDeleteForm($id);

//         return array(
//             'entity'      => $entity,
//             'edit_form'   => $editForm->createView(),
//             'delete_form' => $deleteForm->createView(),
//         );
//     }

//     /**
//      * Edits an existing Equipment entity.
//      *
//      * @Route("/{id}", name="equipment_update")
//      * @Method("PUT")
//      * @Template("StarHoardBundle:Equipment:edit.html.twig")
//      */
//     public function updateAction(Request $request, $id)
//     {
//         $em = $this->getDoctrine()->getManager();

//         $entity = $em->getRepository('StarHoardBundle:Equipment')->find($id);

//         if (!$entity) {
//             throw $this->createNotFoundException('Unable to find Equipment entity.');
//         }

//         $deleteForm = $this->createDeleteForm($id);
//         $editForm = $this->createForm(new EquipmentType(), $entity);
//         $editForm->bind($request);

//         if ($editForm->isValid()) {
//             $em->persist($entity);
//             $em->flush();

//             return $this->redirect($this->generateUrl('equipment_edit', array('id' => $id)));
//         }

//         return array(
//             'entity'      => $entity,
//             'edit_form'   => $editForm->createView(),
//             'delete_form' => $deleteForm->createView(),
//         );
//     }

//     /**
//      * Deletes a Equipment entity.
//      *
//      * @Route("/{id}", name="equipment_delete")
//      * @Method("DELETE")
//      */
//     public function deleteAction(Request $request, $id)
//     {
//         $form = $this->createDeleteForm($id);
//         $form->bind($request);

//         if ($form->isValid()) {
//             $em = $this->getDoctrine()->getManager();
//             $entity = $em->getRepository('StarHoardBundle:Equipment')->find($id);

//             if (!$entity) {
//                 throw $this->createNotFoundException('Unable to find Equipment entity.');
//             }

//             $em->remove($entity);
//             $em->flush();
//         }

//         return $this->redirect($this->generateUrl('equipment'));
//     }

//     /**
//      * Creates a form to delete a Equipment entity by id.
//      *
//      * @param mixed $id The entity id
//      *
//      * @return Symfony\Component\Form\Form The form
//      */
//     private function createDeleteForm($id)
//     {
//         return $this->createFormBuilder(array('id' => $id))
//             ->add('id', 'hidden')
//             ->getForm()
//         ;
//     }
// }
