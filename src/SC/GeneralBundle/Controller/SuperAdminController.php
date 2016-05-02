<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SuperAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('SCGeneralBundle:SuperAdmin:index.html.twig', array(
                // ...
            ));    }

}
