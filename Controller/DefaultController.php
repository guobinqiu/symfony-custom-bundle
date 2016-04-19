<?php

namespace Dataspring\DemoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @Route("/demo/index", name="demo_index")
     */
    public function indexAction()
    {
        return $this->render('DataSpringDemoBundle:Default:index.html.twig');
    }
}
