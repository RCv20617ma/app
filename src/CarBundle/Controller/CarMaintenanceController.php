<?php

namespace CarBundle\Controller;

use AppBundle\Service\EntityCrud;
use CoreBundle\Entity\EntityCrudInterface;
use CoreBundle\Manager\AbstractManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Translation\TranslatorInterface;

class CarMaintenanceController extends Controller
{
    /**
     * @Route("/index", name="app")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entitiesLength = $em->getRepository('CarBundle:CarMaintenance')->counter();
        return $this->render('CarBundle:CarMaintenance:index.html.twig',array('entitiesLength' => $entitiesLength));
    }


    public function ajaxListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $searchParam = $request->get('searchParam');
        $entities = $em->getRepository('CarBundle:CarMaintenance')->search($searchParam);
        var_dump($entities);die();
        $pagination = (new Paginator())->setItems(count($entities), $searchParam['perPage'])->setPage($searchParam['page'])->toArray();
        return $this->render('CarBundle:CarMaintenance:carmaintenances_list.html.twig', array(
            'entities' => $entities,
            'pagination' => $pagination,
        ));
    }
}
