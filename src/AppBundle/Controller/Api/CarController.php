<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\AbstractCar;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class AppController
 * @package AppBundle\Controller\Api
 *
 * @Rest\Route("/car")
 */
class CarController extends FOSRestController
{
    /**
     * @Route("/{id}", name="api_car_get", options={"expose"=true})
     * @Method("GET")
     */
    public function getCarAction(AbstractCar $car)
    {
        $view = $this->view($car, 200);
        return $this->handleView($view);
    }
}
