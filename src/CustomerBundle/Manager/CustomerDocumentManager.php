<?php
namespace CustomerBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CustomerDocument;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CustomerDocumentManager
 * @package CustomerBundle\Manager
 */
class CustomerDocumentManager extends AbstractManager
{

    /**
     * @var CustomerDocumentTypeManager
     */
    public $customerDocumentTypeManager;

    /**
     * @return mixed
     */
    public function getClass()
    {
        return CustomerDocument::class;
    }

    /**
     * CustomerDocumentManager constructor.
     * @param EntityManagerInterface $entityManager
     * @param CustomerDocumentTypeManager $customerDocumentTypeManager
     */
    public function __construct(EntityManagerInterface $entityManager, CustomerDocumentTypeManager $customerDocumentTypeManager)
    {
        parent::__construct($entityManager);
        $this->customerDocumentTypeManager = $customerDocumentTypeManager;
    }

    /**
     * @param string $typeLabel
     * @return CustomerDocument
     */
    public function createByTypeLabel($typeLabel)
    {
        /** @var CustomerDocument $customerDocument */
        $customerDocument = parent::create();
        $type = $this->customerDocumentTypeManager->findOneBy(['label' => $typeLabel]);
        $customerDocument->setDocumentType($type);

        return $customerDocument;
    }


}