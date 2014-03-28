<?php

namespace SM\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SMApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
