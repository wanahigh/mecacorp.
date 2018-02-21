<?php

namespace AppBundle\Controller;

use Acme\ActuBundle\Entity\Entity\Advert;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AcmeActorBundle:Actors a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );
        $em = $this->getDoctrine()->getManager();

        $listeadverts = $em->getRepository('AcmeActuBundle:Entity\Advert')->findAll();
        $adverts = $this->get('knp_paginator')->paginate(
            $listeadverts,
            /*PAGINATION*/
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            3/*nbre d'éléments par page*/
        );
        // replace this example code with whatever you need
        return $this->render('::Accueil.html.twig', array('pagination' => $pagination,'adverts' => $adverts,));
    }

}
