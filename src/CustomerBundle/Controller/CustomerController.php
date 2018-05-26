<?php

namespace CustomerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

use AppBundle\Entity\User;
use CustomerBundle\Manager\AbstractCustomerManager;

/**
 * Class CustomerController
 * @Route("/customer")
 */
class CustomerController extends Controller
{

    /**
     * @param Request $request
     * @param AbstractCustomerManager $abstractCustomerManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="customer_index")
     */
    public function indexAction(Request $request, AbstractCustomerManager $abstractCustomerManager)
    {
        /** @var User $userConnected */
        $userConnected = $this->getUser();
        $allCustomers = $abstractCustomerManager->getAllByAgency($userConnected->getAgency(), $request->query->get('key', null));

        /** @var $paginator Paginator */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allCustomers,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );

        return $this->render('CustomerBundle::index.html.twig', array(
            'pagination' => $pagination
        ));
    }

}

