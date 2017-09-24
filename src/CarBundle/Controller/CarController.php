<?php

namespace CarBundle\Controller;

use CarBundle\Entity\Car;
use CarBundle\Entity\CarBrand;
use CarBundle\Form\CarType;
use CarBundle\Manager\CarManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\Paginator;

use AppBundle\Entity\User;

/**
 * car controller.
 *
 */
class CarController extends Controller
{

    public function listAction(Request $request) {
        /** @var User $userConnected */
        $userConnected = $this->getUser();
        $allCars = $this->getCarManager()->getAllByAgency($userConnected->getAgency(),$request->query->get('key',null));

        /**
         * @var $paginator Paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allCars,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 10)
        );

        return $this->render('CarBundle::index.html.twig',array(
            'pagination' => $pagination
        ));
    }

     public function editAction(Request $request, Car $car = null)
    {
        if (empty($car)) {
            $car = $this->getCarManager()->createByUser($this->getUser());
        }
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getCarManager()->persist($car, true);
            return $this->redirectToRoute('car_car_edit', array('id' => $car->getId()));
        }

        return $this->render('CarBundle:car:edit.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
            'brands' => $this->get('car.manager.car_brand')->findAll()
        ]);
    }

    public function modelsAction(Request $request, CarBrand $brand)
    {
        $models = $this->get('car.manager.car_model')->findCustom(['brand'=>$brand->getId()]);
        return new JsonResponse([
            'models' => $this->get('jms_serializer')->serialize($models,'json')
        ]);
    }


    /**
     * @return CarManager
     */
    private function getCarManager()
    {
        return $this->get('car.manager.car');
    }
}
