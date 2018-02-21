<?php

namespace Acme\ActorBundle\Controller;

use Acme\ActorBundle\Entity\Actors;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ActorsController
 * @package Acme\ActorBundle\Controller
 */
class ActorsController extends Controller
{


    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM AcmeActorBundle:Actors a";
        $query = $em->createQuery($dql);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), 34/*page number*//*limit per page*/
        );

        // parameters to template
        return $this->render('actors/index.html.twig', array('pagination' => $pagination, 'actor' => $dql));
    }

    /**
     * Finds and displays a actor entity.
     *
     */



    public function showAction(Actors $actor)
    {

        return $this->render('actors/show.html.twig', array(
            'actor' => $actor,
        ));

    }

}