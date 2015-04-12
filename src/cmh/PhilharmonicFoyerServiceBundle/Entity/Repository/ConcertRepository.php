<?php

namespace cmh\PhilharmonicFoyerServiceBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Concert;

class ConcertRepository extends EntityRepository
{
    public function findAllByDate()
    {
        return $this->createQueryBuilder('c')
            ->where('c.isActive = :isActive')
            ->setParameters(array(
                'isActive' => true
            ))
            ->getQuery()->getResult();
    }
}