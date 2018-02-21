<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 17/02/18
 * Time: 19:51
 */

namespace Acme\ActuBundle\Repository;

/**
 * Class AdvertRepository
 * @package Acme\ActuBundle\Repository
 */
class AdvertRepository
{
public function findOneByIdJoinedToCategory($productId)
{
    $query = $this->getEntityManager()
        ->createQuery(
            'SELECT p, c FROM main.advert p
            JOIN p.category c
            WHERE p.id = :id'
        )->setParameter('id', $productId);

    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
}}