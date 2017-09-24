<?php
namespace CustomerBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CustomerDocumentType;

/**
 * Class CustomerDocumentTypeManager
 * @package CustomerBundle\Manager
 */
class CustomerDocumentTypeManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return CustomerDocumentType::class;
    }
}