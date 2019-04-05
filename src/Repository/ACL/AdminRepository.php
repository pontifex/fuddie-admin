<?php

namespace App\Repository\ACL;

use App\Entity\ACL\Admin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Psr\Container\ContainerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Admin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admin[]    findAll()
 * @method Admin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminRepository extends ServiceEntityRepository
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(RegistryInterface $registry, ContainerInterface $container)
    {
        parent::__construct($registry, Admin::class);

        $this->container = $container;
        $this->_em = $this->container->get('doctrine.orm.acl_entity_manager');
    }
}
