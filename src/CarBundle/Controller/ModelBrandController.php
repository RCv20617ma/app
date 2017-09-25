<?php
/**
 * Created by PhpStorm.
 * User: abdelhak
 * Date: 24/09/2017
 * Time: 23:50
 */

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use CarBundle\Entity\CarBrand;

class ModelBrandController extends Controller
{

    public function modelsAction(Request $request, CarBrand $brand)
    {
        $models = $this->get('car.manager.car_model')->findBy(['brand' => $brand]);
        return new JsonResponse(
             $this->get('jms_serializer')->serialize($models, 'json')
        );
    }

    public function brandsAction(Request $request)
    {
        $brands = $this->get('car.manager.car_brand')->findAll();
        return new JsonResponse(
             $this->get('jms_serializer')->serialize($brands, 'json')
        );
    }

}