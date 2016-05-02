<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SC\GeneralBundle\Entity\Femme;
use SC\GeneralBundle\Form\FemmeType;

/**
 * Femme controller.
 *
 */
class FemmeController extends Controller
{

    /**
     * Lists all Femme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.context')->getToken()->getUser();

        $entities = $em->getRepository('SCGeneralBundle:Femme')->findByUser($user);

        return $this->render('SCGeneralBundle:Femme:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Femme entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Femme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            //affectation de la nouvelle femme au medecin concerner

            $user = $this->get('security.context')->getToken()->getUser();
            $entity->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('femme', array('id' => $entity->getId())));
        }

        return $this->render('SCGeneralBundle:Femme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Femme entity.
     *
     * @param Femme $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Femme $entity)
    {
        $form = $this->createForm(new FemmeType(), $entity, array(
            'action' => $this->generateUrl('femme_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Femme entity.
     *
     */
    public function newAction()
    {
        $entity = new Femme();
        $form   = $this->createCreateForm($entity);

        return $this->render('SCGeneralBundle:Femme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Femme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Femme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Femme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Femme:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Femme entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Femme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Femme entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Femme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Femme entity.
    *
    * @param Femme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Femme $entity)
    {
        $form = $this->createForm(new FemmeType(), $entity, array(
            'action' => $this->generateUrl('femme_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Femme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Femme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Femme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('femme'));
        }

        return $this->render('SCGeneralBundle:Femme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Femme entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SCGeneralBundle:Femme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Femme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('femme'));
    }

    /**
     * Creates a form to delete a Femme entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('femme_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }



    public function createFemmeAction() {
        $formData = new Femme(); // Your form data class. Has to be an object, won't work properly with an array.

        $flow = $this->get('SCGeneralBundle.form.flow.createFemme'); // must match the flow's service id
        $flow->bind($formData);

        // form of the current step
        $form = $flow->createForm();
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $em = $this->getDoctrine()->getManager();
                $em->persist($formData);
                $em->flush();

                $flow->reset(); // remove step data from the session

                return $this->redirect($this->generateUrl('sc_general_femme')); // redirect when done
            }
        }

        return $this->render('SCGeneralBundle:Femme:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }
}
