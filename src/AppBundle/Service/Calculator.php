<?php

namespace AppBundle\Service;


class Calculator
{

    function calculator($entity)
    {
        $totalOptions = 100;
        $avance =0;         
        $originalPriceDay =100;
        $price = $entity->getPriceDay()*$entity->getNumberDays();
        $total = $price+$totalOptions;
        $reste = $total - $entity->getAvance();
            
        $entity->setReste($reste);
        $entity->setTotalOptions($totalOptions);
        $entity->Avance($avance);
        $entity->setOriginalPriceDay($originalPriceDay);
        $entity->setTotal($total);
    }
}
