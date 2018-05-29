<?php

namespace CarBundle\Controller;

use CarBundle\Entity\SlCar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Slcar controller.
 *
 * @Route("slcar")
 */
class SlCarController extends Controller
{
    /**
     * Lists all slCar entities.
     *
     * @Route("/", name="slcar_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $slCars = $em->getRepository('CarBundle:SlCar')->findAll();

        return $this->render('slcar/index.html.twig', array(
            'slCars' => $slCars,
        ));
    }

    /**
     * Finds and displays a slCar entity.
     *
     * @Route("/{id}", name="slcar_show")
     * @Method("GET")
     */
    public function showAction(SlCar $slCar)
    {
        $deleteForm = $this->createDeleteForm($slCar);

        return $this->render('slcar/show.html.twig', array(
            'slCar' => $slCar,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
