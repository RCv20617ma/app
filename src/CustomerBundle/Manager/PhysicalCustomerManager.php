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
     * @return PhysicalCustomer|mixed
     */
    public function create()
    {
        /** @var PhysicalCustomer $physicalCustomer */
        $physicalCustomer = parent::create();

        $physicalCustomer->addPhone(new CustomerPhone());
        $physicalCustomer->addEmail(new CustomerEmail());
        $physicalCustomer->setNationality('MA');

        $customerDocumentRepo = $this->entityManager->getRepository(CustomerDocumentType::class);
        $documentTypeCin = $customerDocumentRepo->findOneByCode(CustomerDocumentType::CIN_CODE);
        $documentTypePassPort = $customerDocumentRepo->findOneByCode(CustomerDocumentType::PASSPORT_CODE);
        $documentTypeDrivingLicence = $customerDocumentRepo->findOneByCode(CustomerDocumentType::DRIVING_LICENCE_CODE);

        $physicalCustomer->addDocument(new CustomerDocument($documentTypeCin));
        $physicalCustomer->addDocument(new CustomerDocument($documentTypeDrivingLicence));
        $physicalCustomer->addDocument(new CustomerDocument($documentTypePassPort));

        return $physicalCustomer;
    }


}