<?php

namespace Dataspring\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DataSpringDemoBundle:Default:index.html.twig');
    }
}
