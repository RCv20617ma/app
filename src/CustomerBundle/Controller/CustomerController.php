<?php

namespace CustomerBundle\Controller;

use AppBundle\Entity\User;
use CustomerBundle\Entity\MoralCustomer;
use CustomerBundle\Manager\AbstractCustomerManager;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * customer controller.
 *
 */
class CustomerController extends Controller
{

    /**
     *
     */
    public function listAction(Request $request) {
        /** @var User $userConnected */
        $userConnected = $this->getUser();
        $allCustomers = $this->getAbstractCustomerManager()->getAllByAgency($userConnected->getAgency(),$request->query->get('key',null));

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
     * @return AbstractCustomerManager
     */
    private function getAbstractCustomerManager() {
        return $this->get('customer.manager.abstract_customer');
    }
}
