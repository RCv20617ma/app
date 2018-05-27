<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Translation\TranslatorInterface;

class ReferenceTranslatorListener
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * ReferenceTranslatorListener constructor.
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof AbstractReference) {
            return;
        }

        $entity->setTranslatedLabel($this->translator->trans($entity->getLabel()));
    }
}