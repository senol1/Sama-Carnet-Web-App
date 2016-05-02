<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SC\GeneralBundle\Entity\Conseils;
use SC\GeneralBundle\Form\ConseilsType;

/**
 * Conseils controller.
 *
 */
class ConseilsController extends Controller
{

    /**
     * Lists all Conseils entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SCGeneralBundle:Conseils')->findAll();

        return $this->render('SCGeneralBundle:Conseils:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Conseils entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Conseils();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conseils_show', array('id' => $entity->getId())));
        }

        return $this->render('SCGeneralBundle:Conseils:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Conseils entity.
     *
     * @param Conseils $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Conseils $entity)
    {
        $form = $this->createForm(new ConseilsType(), $entity, array(
            'action' => $this->generateUrl('conseils_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Conseils entity.
     *
     */
    public function newAction()
    {
        $entity = new Conseils();
        $form   = $this->createCreateForm($entity);

        return $this->render('SCGeneralBundle:Conseils:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conseils entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Conseils')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conseils entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Conseils:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Conseils entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Conseils')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conseils entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Conseils:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Conseils entity.
    *
    * @param Conseils $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Conseils $entity)
    {
        $form = $this->createForm(new ConseilsType(), $entity, array(
            'action' => $this->generateUrl('conseils_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Conseils entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Conseils')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conseils entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('conseils_edit', array('id' => $id)));
        }

        return $this->render('SCGeneralBundle:Conseils:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Conseils entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SCGeneralBundle:Conseils')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Conseils entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('conseils'));
    }

    /**
     * Creates a form to delete a Conseils entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conseils_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
