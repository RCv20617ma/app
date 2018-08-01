<?php

namespace AppBundle\Controller;

use AppBundle\Service\EntityCrud;
use AppBundle\Entity\EntityCrudInterface;
use AppBundle\Manager\AbstractManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Translation\TranslatorInterface;

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
    public function editAction(Request $request, TranslatorInterface $translator, EntityCrud $entityCrud, $entity, $id = null)
    {
        /** @var AbstractManager $entityManager */
        $entityManager = $this->get($entityCrud->getEntityManagerClassName($entity));

        /** @var EntityCrudInterface $entity */
        $entity = $id != null ? $entityManager->find($id) : null;
        if (empty($entity)) {
            $entity = $entityManager->create();
        }
        $form = $this->createForm($entity->getFormTypeClassName(), $entity);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity, true);
            $this->addFlash('success', $translator->trans('msg.success_operation'));
            return $this->redirectToRoute('entity_edit', ['id' => $entity->getId(), 'entity' => $entity->getSlug()]);
        }

        return $this->render($entity->getPreFixView() . ':edit.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }


}
