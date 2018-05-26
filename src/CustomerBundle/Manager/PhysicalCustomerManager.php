<?php
namespace CustomerBundle\Manager;

use AppBundle\Entity\User;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CustomerEmail;
use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\PhysicalCustomer;

/**
 * Class PhysicalCustomerManager
 * @package CustomerBundle\Manager
 */
class PhysicalCustomerManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return PhysicalCustomer::class;
    }

    /**
     * @param Agency $agency
     * @return mixed
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAllByAgency(Agency $agency) {
        return $this->getRepository()->findAllByAgency($agency);
    }

    /**
     * @param User $userConnected
     * @return PhysicalCustomer
     */
    public function createByUser(User $userConnected)
    {
        /** @var PhysicalCustomer $physicalCustomer */
        $physicalCustomer = parent::create();
        $physicalCustomer->setAgency($userConnected->getAgency());

        $physicalCustomer->addPhone(new CustomerPhone());
        $physicalCustomer->addEmail(new CustomerEmail());

        return $physicalCustomer;
    }


}