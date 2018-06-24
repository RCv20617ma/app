<?php

namespace CoreBundle\EventListener;

use AppBundle\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class EntityPermissionListener
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    private $excludedEntities = [User::class];

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
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (in_array(get_class($entity), $this->excludedEntities) || !is_callable([$entity, 'getAgency'])) {
            return;
        }

        if (!empty($entity->getAgency())) {
            /** @var User $user */
            $user = $this->tokenStorage->getToken()->getUser();
            if ($user->getAgency()->getId() != $entity->getAgency()->getId() && !$user->hasRole(User::ROLE_IT)) {
                throw new AccessDeniedException();
            }
        }
    }
}

