<?php

namespace Acme\ActuBundle\Controller;

use Acme\ActuBundle\Entity\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 *
 * @Route("entity_comment")
 */
class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     * @Route("/", name="entity_comment_index")
     * @Method("GET")
     */
    public function indexAction(request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $listeadverts = $em->getRepository('AcmeActuBundle:Entity\Comment')->findAll();
        $Comment = $this->get('knp_paginator')->paginate(
            $listeadverts,
            /*PAGINATION*/
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            3/*nbre d'éléments par page*/
        );
        return $this->render('', array(
            'Adverts' => $Comment,));
    }

    /**
     * Creates a new comment entity.
     *
     * @Route("/new", name="entity_comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm('Acme\ActuBundle\Form\Entity\CommentType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return $this->render(':entity/advert:show.html.twig', array(
                'comment' => $comment,
                'form' => $form->createView()));
        }



    }

    /**
     * Finds and displays a comment entity.
     *
     * @Route("/{id}", name="entity_comment_show")
     * @Method("GET")
     */
    public function showAction(Comment $comment)
    {
        $Form = $this->createForm($comment);

        return $this->render('entity/advert/show.html.twig', array(
            'comment' => $comment,
            'delete_form' => $Form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comment entity.
     *
     * @Route("/{id}/edit", name="entity_comment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comment $comment)
    {
        $deleteForm = $this->createDeleteForm($comment);
        $editForm = $this->createForm('Acme\ActuBundle\Form\Entity\CommentType', $comment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entity_comment_edit', array('id' => $comment->getId()));
        }

        return $this->render('entity/comment/edit.html.twig', array(
            'comment' => $comment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comment entity.
     *
     * @Route("/{id}", name="entity_comment_delete")
     * @Method("DELETE")
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
     * Creates a form to delete a comment entity.
     *
     * @param Comment $comment The comment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comment $comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entity_comment_delete', array('id' => $comment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
