<?php
/**
 * Created by PhpStorm.
 * User: WebDev
 * Date: 29.11.2018 г.
 * Time: 12:16 ч.
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findByNameAndPrice() {

       $query = $this->getEntityManager()
           ->createQuery('SELECT p FROM AppBundle:Product p WHERE p.id = :id')
           ->setParameter('id',5);

       return $query->getResult();

    }

}