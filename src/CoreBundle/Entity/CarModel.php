<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarModel
 *
 * @ORM\Table(name="car_model")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CarModelRepository")
 */
class CarModel extends AbstractReference
{
}
