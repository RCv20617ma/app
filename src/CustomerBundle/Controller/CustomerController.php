<?php

namespace CustomerBundle\Controller;

use CustomerBundle\Entity\CustomerEmail;
use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\MoralCustomer;
use CustomerBundle\Entity\PhysicalCustomer;
use CustomerBundle\Form\PhysicalCustomerType;
use CustomerBundle\Manager\PhysicalCustomerManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

use AppBundle\Entity\User;
use CustomerBundle\Manager\AbstractCustomerManager;

/**
 * customer controller.
 *
 */
class CustomerController extends Controller
{

    /**
     * @param Request $request
     * @param AbstractCustomerManager $abstractCustomerManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request, AbstractCustomerManager $abstractCustomerManager) {
        /** @var User $userConnected */
        $userConnected = $this->getUser();
        $allCustomers = $abstractCustomerManager->getAllByAgency($userConnected->getAgency(),$request->query->get('key',null));

        /**
         * @var $paginator Paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allCustomers,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );

        return $this->render('CustomerBundle::index.html.twig',array(
            'pagination' => $pagination
        ));
    }

    /**
     * @param Request $request
     * @param PhysicalCustomerManager $physicalCustomerManager
     * @param PhysicalCustomer|null $physicalCustomer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \CoreBundle\Exception\UnsupportedObjectException
     */
    public function editAction(Request $request, PhysicalCustomerManager $physicalCustomerManager, PhysicalCustomer $physicalCustomer = null)
    {
        if (empty($physicalCustomer)) {
            $physicalCustomer = $physicalCustomerManager->createByUser($this->getUser());
        }
        $form = $this->createForm(PhysicalCustomerType::class, $physicalCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $physicalCustomerManager->persist($physicalCustomer, true);
            return $this->redirectToRoute('customer_physical_customer_edit', array('id' => $physicalCustomer->getId()));
        }

        return $this->render('CustomerBundle:Customer:Physical/edit.html.twig', [
            'customer' => $physicalCustomer,
            'form' => $form->createView(),
        ]);
    }
}
