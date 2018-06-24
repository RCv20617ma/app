<?php

namespace CarBundle\Controller;

use CarBundle\Manager\CarMaintenanceManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class CarMaintenanceController
 * @package CarBundle\Controller
 * @Route("/carMaintenance")
 */
class CarMaintenanceController extends Controller
{
    /**
     * @param CarMaintenanceManager $carMaintenanceManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="carMaintenance_index")
     * @Method("GET")
     */
    public function indexAction(CarMaintenanceManager $carMaintenanceManager)
    {
        $carMaintenances = $carMaintenanceManager->findBy(['agency' => $this->getUser()->getAgency()]);

        return $this->render('CarBundle::CarMaintenance/index.html.twig', ['carMaintenances' => $carMaintenances]);
    }
}
