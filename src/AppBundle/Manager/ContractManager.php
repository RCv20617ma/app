<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Contract;
use AppBundle\Entity\Agency;
use AppBundle\Manager\AbstractManager;

/**
 * Class ContractManager
 * @package AppBundle\Manager
 */
class ContractManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return Contract::class;
    }
}
