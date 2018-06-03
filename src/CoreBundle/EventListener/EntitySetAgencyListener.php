<?php

namespace CoreBundle\EventListener;

use AppBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EntitySetAgencyListener
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * EntitySetAgencyListener constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (!is_callable([$entity, 'setAgency'])) {
            return;
        }

        if (empty($entity->getAgency())) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            $entity->setAgency($user->getAgency());
        }
    }
}

