<?php
namespace CarBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\CarDocument;

/**
 * Class CarDocumentManager
 * @package CarBundle\Manager
 */
class CarDocumentManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return CarDocument::class;
    }


}