<?php

namespace Acme\FilialeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeFilialeBundle:Default:index.html.twig');
    }
}
