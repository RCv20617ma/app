<?php

namespace AppBundle\Controller;

use AppBundle\Service\EntityCrud;
use CoreBundle\Entity\EntityCrudInterface;
use CoreBundle\Manager\AbstractManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AppController extends Controller
{
    /**
     * @Route("/", name="app_dashboard")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig');
    }


    /**
     * @Route("/{entity}/edit/{id}", name="entity_edit", defaults={"id" = null }, requirements={"id"="\d+"})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EntityCrud $entityCrud, $entity, $id = null)
    {
        /** @var AbstractManager $entityManager */
        $entityManager = $this->get($entityCrud->getEntityManager($entity));

        /** @var EntityCrudInterface $entity */
        $entity = $id != null ? $entityManager->find($id) : null;
        if (empty($entity)) {
            $entity = $entityManager->createByUser($this->getUser());
        }
        $form = $this->createForm($entity->getFormType(), $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity, true);
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Welcome to the Death Star, have a magical day!')
            ;
            return $this->redirectToRoute('entity_edit', ['id' => $entity->getId(), 'entity' => $entity->getSlug()]);
        }

        return $this->render($entity->getPreFixView() . '/edit.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }


}
