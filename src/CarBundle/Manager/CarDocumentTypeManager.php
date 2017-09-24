<?php
namespace CarBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\CarDocumentType;

/**
 * Class CarDocumentTypeManager
 * @package CarBundle\Manager
 */
class CarDocumentTypeManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return CarDocumentType::class;
    }

    /**
     * @param Agency $agency
     * @param null $key
     * @return mixed
     */
    public function getAllByAgency(Agency $agency,$key = null) {
        return $this->getRepository()->findAllByAgency($agency,$key);
    }


}