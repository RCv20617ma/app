<?php
namespace AppBundle\Manager;

use AppBundle\Entity\User;
use AppBundle\Entity\Agency;
use AppBundle\Manager\AbstractManager;
use AppBundle\Entity\CustomerDocument;
use AppBundle\Entity\CustomerDocumentType;
use AppBundle\Entity\CustomerEmail;
use AppBundle\Entity\CustomerPhone;
use AppBundle\Entity\PhysicalCustomer;

/**
 * Class PhysicalCustomerManager
 * @package AppBundle\Manager
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
        $physicalCustomer->addDocument(new CustomerDocument());

        return $physicalCustomer;
    }


}