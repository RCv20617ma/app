<?php

namespace CustomerBundle\Controller;

use CustomerBundle\Entity\MoralCustomer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Moralcustomer controller.
 *
 * @Route("customer")
 */
class MoralCustomerController extends Controller
{
    /**
     * Lists all moralCustomer entities.
     *
     * @Route("/", name="customer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moralCustomers = $em->getRepository('CustomerBundle:MoralCustomer')->findAll();

        return $this->render('moralcustomer/index.html.twig', array(
            'moralCustomers' => $moralCustomers,
        ));
    }

    /**
     * Creates a new moralCustomer entity.
     *
     * @Route("/new", name="customer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $moralCustomer = new Moralcustomer();
        $form = $this->createForm('CustomerBundle\Form\MoralCustomerType', $moralCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moralCustomer);
            $em->flush();

            return $this->redirectToRoute('customer_show', array('id' => $moralCustomer->getId()));
        }

        return $this->render('moralcustomer/new.html.twig', array(
            'moralCustomer' => $moralCustomer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a moralCustomer entity.
     *
     * @Route("/{id}", name="customer_show")
     * @Method("GET")
     */
    public function showAction(MoralCustomer $moralCustomer)
    {
        $deleteForm = $this->createDeleteForm($moralCustomer);

        return $this->render('moralcustomer/show.html.twig', array(
            'moralCustomer' => $moralCustomer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing moralCustomer entity.
     *
     * @Route("/{id}/edit", name="customer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MoralCustomer $moralCustomer)
    {
        $deleteForm = $this->createDeleteForm($moralCustomer);
        $editForm = $this->createForm('CustomerBundle\Form\MoralCustomerType', $moralCustomer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('customer_edit', array('id' => $moralCustomer->getId()));
        }

        return $this->render('moralcustomer/edit.html.twig', array(
            'moralCustomer' => $moralCustomer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a moralCustomer entity.
     *
     * @Route("/{id}", name="customer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MoralCustomer $moralCustomer)
    {
        $form = $this->createDeleteForm($moralCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moralCustomer);
            $em->flush();
        }

        return $this->redirectToRoute('customer_index');
    }

    /**
     * Creates a form to delete a moralCustomer entity.
     *
     * @param MoralCustomer $moralCustomer The moralCustomer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MoralCustomer $moralCustomer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customer_delete', array('id' => $moralCustomer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
