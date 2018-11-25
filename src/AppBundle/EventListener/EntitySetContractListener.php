<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\User;
use AppBundle\Manager\ContractManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use AppBundle\Entity\Contract;
use AppBundle\Service\Calculator;

class EntitySetContractListener
{
    /**
     * @var ContractManager
     */
    private $contractManager;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * EntitySetContractListener constructor.
     * @param ContractManager $contractManager
     */
    public function __construct(TokenStorageInterface $tokenStorage, ContractManager $contractManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->contractManager = $contractManager;
    }

    /**
     * @return \AppBundle\Entity\Agency
     */
    private function getAgency() {
        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();
        return $user->getAgency();
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\ORM\ORMException
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        // only act on some "Product" entity
        if (!$entity instanceof Contract) {
            return;
        }
       $entity = $this->contractManager->prePersist($entity, $this->getAgency());
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\ORM\ORMException
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // only act on some "Product" entity
        if (!$entity instanceof Contract) {
            return;
        }

        $entity = $this->contractManager->prePersist($entity);
    }
}
