<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SC\GeneralBundle\Entity\Examen;
use SC\GeneralBundle\Form\ExamenType;

/**
 * Examen controller.
 *
 */
class ExamenController extends Controller
{
    protected $id_femme_current = null;
    /*
     * Calendrier des rendez vous d'examens
     *
     * */
    public function calendrierAction(){
        return $this->render('SCGeneralBundle:Examen:calendrier.html.twig');
    }

    /**
     * Lists all Examen entities.
     *
     */
    public function indexAction($id)
    {
        $this->id_femme_current = $id;
        $em = $this->getDoctrine()->getManager();

        $femme = $em->getRepository('SCGeneralBundle:Femme')->find($id);
        $entities = $em->getRepository('SCGeneralBundle:Examen')->findByFemme($femme);

        return $this->render('SCGeneralBundle:Examen:index.html.twig', array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new Examen entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Examen();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $femme = $em->getRepository('SCGeneralBundle:Femme')->find($this->id_femme_current);
            $entity->setFemme($femme);


            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('examen'));
        }

        return $this->render('SCGeneralBundle:Examen:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Examen entity.
     *
     * @param Examen $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Examen $entity)
    {
        $form = $this->createForm(new ExamenType(), $entity, array(
            'action' => $this->generateUrl('examen_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Examen entity.
     *
     */
    public function newAction()
    {
        $entity = new Examen();
        $form   = $this->createCreateForm($entity);

        return $this->render('SCGeneralBundle:Examen:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Examen entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Examen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Examen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Examen:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Examen entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Examen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Examen entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SCGeneralBundle:Examen:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Examen entity.
    *
    * @param Examen $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Examen $entity)
    {
        $form = $this->createForm(new ExamenType(), $entity, array(
            'action' => $this->generateUrl('examen_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Examen entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Examen')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Examen entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('examen_edit', array('id' => $id)));
        }

        return $this->render('SCGeneralBundle:Examen:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Examen entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SCGeneralBundle:Examen')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Examen entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('examen'));
    }

    /**
     * Creates a form to delete a Examen entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('examen_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
