<?php

namespace Acme\AccueilBundle\Controller;

use Acme\ActuBundle\Entity\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request)


{
    $em = $this->getDoctrine()->getManager();

    $listeadverts = $em->getRepository('AcmeActuBundle:Entity\Advert')->findAll();
    $adverts = $this->get('knp_paginator')->paginate(
        $listeadverts,
        /*PAGINATION*/
        $request->query->get('page', 1)/*le numéro de la page à afficher*/,
        3/*nbre d'éléments par page*/
    );
    return $this->render('', array(
        'adverts' => $adverts,));

}

}
