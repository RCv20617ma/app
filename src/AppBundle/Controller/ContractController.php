<?php

namespace AppBundle\Controller;

use AppBundle\Manager\ContractManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ContractController
 * @package AppBundle\Controller
 * @Route("/contract")
 */
class ContractController extends Controller
{
    /**
     * @param ContractManager $contractManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="contract_index")
     * @Method("GET")
     */
    public function indexAction(ContractManager $contractManager)
    {
        $contracts = $contractManager->findBy(['agency' => $this->getUser()->getAgency()]);

        return $this->render('AppBundle::contract/index.html.twig', ['contracts' => $contracts]);
    }
}
