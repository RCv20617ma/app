<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Contract;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;

/**
 * Class ContractManager
 * @package CustomerBundle\Manager
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
