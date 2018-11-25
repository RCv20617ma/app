<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Contract;
use AppBundle\Entity\User;
use AppBundle\Manager\AbstractManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * Class ContractManager
 * @package AppBundle\Manager
 */
class ContractManager extends AbstractManager
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * EntitySetAgencyListener constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return Contract::class;
    }

    /**
     * @return int
     * @throws \Doctrine\ORM\ORMException
     */
    public function getNextNumber($agency)
    {
        $number = $this->getRepository()->getLastNumberForAgency($agency);
        return $number ? $number++ : 1;
    }

    /**
     * @param Contract $contract
     * @return Contract
     * @throws \Doctrine\ORM\ORMException
     */
    public function prePersist(Contract $contract, $agency)
    {
        $contract->setOriginalPriceDay($contract->getCar() ? $contract->getCar()->getPriceDay() : 0);
        $contract->setTotal($contract->getPriceDay() * $contract->getNumberDays());
        $contract->setNumber($this->getNextNumber($agency));

        return $contract;
    }
}
