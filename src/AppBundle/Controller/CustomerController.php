<?php

namespace AppBundle\Controller;

use AppBundle\Manager\PhysicalCustomerManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

use AppBundle\Entity\User;
use AppBundle\Manager\AbstractCustomerManager;

/**
 * Class CustomerController
 * @Route("/customer")
 */
class CustomerController extends Controller
{

    /**
     * @param Request $request
     * @param PhysicalCustomerManager $physicalCustomerManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="customer_index")
     */
    public function indexAction(Request $request, PhysicalCustomerManager $physicalCustomerManager)
    {
        $customers = $physicalCustomerManager->findBy(['agency' => $this->getUser()->getAgency()], ['id' => 'DESC']);

        return $this->render('AppBundle::index.html.twig', array(
            'customers' => $customers
        ));
    }

}
