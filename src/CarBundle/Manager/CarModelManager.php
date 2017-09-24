<?php
namespace CarBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\CarModel;

/**
 * Class CarModelManager
 * @package CarBundle\Manager
 */
class CarModelManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return CarModel::class;
    }

    /**
     * @param array $criteria
     * @param bool $getResult
     * @return array|\Doctrine\ORM\QueryBuilder
     */
    public function findCustom($criteria = [],$getResult = true){
        return $this->getRepository()->findCustom($criteria,$getResult);
    }



}