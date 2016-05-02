<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('SCGeneralBundle:Admin:index.html.twig', array(
                // ...
            ));
    }

    public function profileAction()
    {
        return $this->render('SCGeneralBundle:Admin:profile.html.twig', array(
            // ...
        ));
    }

    public function rendezvousAction()
    {
        return $this->render('SCGeneralBundle:Admin:rendezvous.html.twig', array(
            // ...
        ));
    }

    public  function statusAction($status,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SCGeneralBundle:Femme')->find($id);

        if($status == true)
        {
            $status = false;
        }
        else
        {
            $status = true;
        }

        $entity->setStatus($status);
        $em->persist($entity);
        $em->flush($entity);
        return $this->redirect('femme');
    }
    public function statsAction()
    {
        $em = $this->getDoctrine()->getManager();


        $user= $this->get('security.context')->getToken()->getUser();
        //$user->getUsername();

        //nombre de patients pour le medecin courant
        $totales_patientes = $em->createQuery(
            'SELECT COUNT(u) FROM SCGeneralBundle:Femme u WHERE u.user = :user'
        )->setParameter('user',$user)->getSingleScalarResult();


        return $this->render('SCGeneralBundle:Admin:stats.html.twig', array(
            "totales_patientes" => $totales_patientes
        ));
    }

}
