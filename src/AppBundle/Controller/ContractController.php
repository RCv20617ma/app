<?php

namespace AppBundle\Controller;

use AppBundle\Manager\ContractManager;
use AppBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Serializer\Serializer;

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

    /**
     * car list using ajax
     *@Route("/car_ajax", name="car_ajax")
     *
     */
    public function ajaxListAction(Request $request)
    {   
        if ($request->isXmlHttpRequest())
          {
            $repository = $this->getDoctrine()->getRepository(Car::class);
            $carId = $request->get('id');
            $car = $repository->find($carId);      
            $data = $this->get('jms_serializer')->serialize($car, 'json');
            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
          }
          return new Response("Erreur : Ce n'est pas une requete Ajax",400);
        
    }
}
