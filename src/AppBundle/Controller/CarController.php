<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 03/07/2018
 * Time: 23:09
 */

namespace AppBundle\Controller;

use AppBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ChargeController
 * @package AppBundle\Controller
 * @Route("/car")
 */
class CarController extends Controller
{
    /**
     * @param CarManager $carManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="car_index")
     * @Method("GET")
     */
    public function indexAction(CarManager $carManager)
    {
        $cars = $carManager->findBy(['agency' => $this->getUser()->getAgency()]);

        return $this->render('AppBundle::Car/index.html.twig', ['cars' => $cars]);
    }
}
