<?php
namespace Acme\ActorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ActorBundle\Entity\Actors;

class AutocompleteController extends Controller
{
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AcmeActorBundle:Actors')
        ;

        $listActors = $repository->findBy(
            [],                      // Critere
            ['id' => 'desc'],        // Tri
            null,                         // Limite
            null                          // Offset
        );


        return $this->render('actors/show.html.twig', array(
            'listActors' => $listActors,
        ));

    }
}