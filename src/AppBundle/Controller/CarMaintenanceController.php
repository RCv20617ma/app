<?php

namespace AppBundle\Controller;

use AppBundle\Manager\CarMaintenanceManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class CarMaintenanceController
 * @package AppBundle\Controller
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

        return $this->render('AppBundle::CarMaintenance/index.html.twig', ['carMaintenances' => $carMaintenances]);
    }
}
