<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:22
 */

namespace AppBundle\Controller;

use AppBundle\Manager\ChargeManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ChargeController
 * @package AppBundle\Controller
 * @Route("/charge")
 */
class ChargeController extends Controller
{
    /**
     * @param ChargeManager $chargeManager
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="charge_index")
     * @Method("GET")
     */
    public function indexAction(ChargeManager $chargeManager)
    {
        $charges = $chargeManager->findBy(['agency' => $this->getUser()->getAgency()]);

        return $this->render('AppBundle::Charge/index.html.twig', ['charges' => $charges]);
    }

}