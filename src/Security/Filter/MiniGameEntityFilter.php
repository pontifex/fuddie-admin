<?php

namespace App\Security\Filter;

use App\Entity\ACL\Admin;
use App\Entity\RestaurantHasMiniGame;
use App\Security\RoleInterface;
use Doctrine\ORM\QueryBuilder;
use Psr\Container\ContainerInterface;

class MiniGameEntityFilter
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function filterListQueryBuilder(
        QueryBuilder $qb,
        Admin $admin = null
    ) {
        return $this->filterQueryBuilder($qb, $admin);
    }

    public function filterSearchQueryBuilder(
        QueryBuilder $qb,
        Admin $admin = null
    ) {
        return $this->filterQueryBuilder($qb, $admin);
    }

    private function filterQueryBuilder(
        QueryBuilder $qb,
        Admin $admin = null
    ) {
        // do not show soft deleted
        $qb->andWhere('entity.dDeletedAt IS NULL');

        if ($admin->hasRole(RoleInterface::ROLE_SUPER_ADMIN)) {
            return $qb;
        }

        // show without company or with company granted to
        if ($admin->hasRole(RoleInterface::ROLE_COMPANY_ADMIN)) {
            $qb->innerJoin(RestaurantHasMiniGame::class, 'restaurantHasMiniGame');
            $qb->innerJoin('restaurantHasMiniGame.fkRestaurant', 'restaurant');

            $where = 'restaurant.fkCompany IS NULL';

            if (count($admin->getCompanies())) {
                $where .= ' OR restaurant.fkCompany IN ('.implode(', ', $admin->getCompanies()).')';
            }

            $qb->andWhere($where);
        }

        return $qb;
    }
}
