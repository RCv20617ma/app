<?php
namespace CustomerBundle\Manager;

use AppBundle\Entity\User;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
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
        $physicalCustomer->setCreatedBy($userConnected);
        $physicalCustomer->setUpdatedBy($userConnected);

        $physicalCustomer->addPhone(new CustomerPhone());

        return $physicalCustomer;
    }


}