<?php
namespace CustomerBundle\Manager;

use AppBundle\Entity\User;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CustomerDocument;
use CustomerBundle\Entity\CustomerDocumentType;
use CustomerBundle\Entity\CustomerEmail;
use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\PhysicalCustomer;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class PhysicalCustomerManager
 * @package CustomerBundle\Manager
 */
class PhysicalCustomerManager extends AbstractManager
{
    /**
     * @var CustomerDocumentTypeManager
     */
    public $customerDocumentManager;

    public function __construct(EntityManagerInterface $entityManager, CustomerDocumentManager $customerDocumentManager)
    {
        parent::__construct($entityManager);
        $this->customerDocumentManager = $customerDocumentManager;
    }

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
        $physicalCustomer->setNationality(PhysicalCustomer::DEFAULT_NATIONALITY);

        $physicalCustomer->addPhone(new CustomerPhone(true));
        $physicalCustomer->addEmail(new CustomerEmail(true));

        // Add document
        $drivingDocument = $this->customerDocumentManager->createByTypeLabel(CustomerDocumentType::DRIVING_LICENCE_LABEL);
//        $physicalCustomer->addDocument($drivingDocument);

        return $physicalCustomer;
    }


}