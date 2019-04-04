<?php

namespace App\Security\Filter;

use App\Entity\ACL\Admin;
use App\Entity\Restaurant;
use App\Security\RoleInterface;
use Doctrine\ORM\QueryBuilder;

class OrderEntityFilter
{
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

        if ($admin->hasRole(RoleInterface::ROLE_COMPANY_ADMIN)
            || $admin->hasRole(RoleInterface::ROLE_RESTAURANT_ADMIN)
        ) {
            $qb->innerJoin(Restaurant::class, 'restaurant');

            $where = '';

            // show without company or with company granted to
            if ($admin->hasRole(RoleInterface::ROLE_COMPANY_ADMIN)) {
                $where = 'restaurant.fkCompany IS NULL';

                if (count($admin->getCompanies())) {
                    $where .= ' OR restaurant.fkCompany IN ('.implode(', ', $admin->getCompanies()).')';
                }
            }

            // show without restaurant or with restaurant granted to
            if ($admin->hasRole(RoleInterface::ROLE_RESTAURANT_ADMIN)) {
                if (mb_strlen($where)) {
                    $where .= ' OR ';
                }
                $where .= 'entity.fkRestaurant IS NULL';

                if (count($admin->getRestaurants())) {
                    $where .= ' OR entity.fkRestaurant IN ('.implode(', ', $admin->getRestaurants()).')';
                }
            }

            $qb->andWhere($where);
        }

        return $qb;
    }
}
