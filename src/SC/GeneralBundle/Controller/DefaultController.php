<?php

namespace SC\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SCGeneralBundle:Default:index.html.twig');
    }
}
