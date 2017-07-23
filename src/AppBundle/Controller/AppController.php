<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AppController extends Controller
{
    /**
     * @Route("/", name="app_dashboard")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::index.html.twig');
    }
}
