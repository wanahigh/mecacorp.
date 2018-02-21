<?php

namespace Acme\ActuBundle\Controller\Entity;

use Acme\ActuBundle\Entity\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Acme\ActuBundle\Entity\Entity\Comment;

/**
 * Advert controller.
 *
 */
class AdvertController extends Controller
{
    /**
     * Lists all advert entities.
     *
     */
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
        return $this->render(':entity/advert:index.html.twig', array(
            'adverts' => $adverts,));
    }


    /**
     * Creates a new advert entity.
     *
     */
    public function newAction(Request $request)
    {
        $advert = new Advert();
        $form = $this->createForm('Acme\ActuBundle\Form\Entity\AdvertType', $advert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            return $this->redirectToRoute('entity_advert_show', array('id' => $advert->getId()));
        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        return $this->render('entity/advert/show.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a advert entity.
     *
     */
    public function showAction($id, request $request)

        {  $comment = new Comment();
            $form = $this->createForm('Acme\ActuBundle\Form\Entity\CommentType', $comment);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
            }

            // On récupère l'EntityManager
            $em = $this->getDoctrine()
                ->getManager();
            // On récupère l'entité correspondant à l'id $id
            $advert = $em->getRepository('AcmeActuBundle:Entity\Advert')
                ->find($id);
            if($advert === null)
            {
                throw $this->createNotFoundException('advert[id='.$id.'] inexistant.');
            }
            // On récupère la liste des commentaires
            $Comment = $em->getRepository('AcmeActuBundle:Entity\Comment')
                ->findAll();
            // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'advert :
            return $this->render('entity/advert/show.html.twig', array(
                'advert'  => $advert,
                'Comment' => $Comment,
                 'form' => $form->createView(),
            ));

                }
//
//            $comment = new Comment();
//            $form = $this->createForm('Acme\ActuBundle\Form\Entity\CommentType', $comment);
//            $form->handleRequest($request);
//
//            if ($form->isSubmitted() && $form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($comment);
//                $em->flush();
//            }
//                $em = $this->getDoctrine()->getManager();
//                $Comment = $em->getRepository('AcmeActuBundle:Entit')->findAll();
//


//
//            return $this->render('entity/advert/show.html.twig', array(
//            'Comment'=>$Comment,
//            'advert' => $advert,
//            'form' => $form->createView(),
//
//        ));


    /**
     * Displays a form to edit an existing advert entity.
     *
     */
    public function editAction(Request $request, Advert $advert)
    {

        $deleteForm = $this->createDeleteForm($advert);
        $editForm = $this->createForm('Acme\ActuBundle\Form\Entity\AdvertType', $advert);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entity_advert_edit', array('id' => $advert->getId()));
        }

        return $this->render('entity/advert/edit.html.twig', array(
            'advert' => $advert,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a advert entity.
     *
     */
    public function deleteAction(Request $request, Comment $comment)
    {
        $form = $this->createDeleteForm($comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comment);
            $em->flush();
        }

        return $this->redirectToRoute('entity_advert_show');
    }

    /**
     * Creates a form to delete a advert entity.
     *
     * @param Advert $advert The advert entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Comment $comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entity_comment_delete', array('id' => $comment->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


    public function postUserCommentsAction($slug)
    {
        if (!$this->validate($slug)) {
            throw new HttpException(400, "Nouveau commentaire est invalide.");
        }
    }


}

