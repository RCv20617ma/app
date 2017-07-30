<?php

namespace CoreBundle\Entity\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Translation\TranslatorInterface;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;

/**
 * Class ReferenceListener
 * @package CoreBundle\Entity\Listener
 */
class ReferenceListener
{
    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * ReferenceListener constructor.
     * @param Translator $translator
     */
    public function __construct(Translator $translator = null)
    {
        $this->translator = $translator;
    }

    /**
     * @param AbstractReference $reference
     * @param LifecycleEventArgs $event
     */
    public function postLoad(AbstractReference $reference, LifecycleEventArgs $event)
    {
     //   $reference->setLabel($this->translator->trans($reference->getLabel()));
    }
}
