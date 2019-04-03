<?php

namespace App\Security\Filter;

use App\Entity\ACL\Admin;
use App\Security\RoleInterface;
use Doctrine\ORM\QueryBuilder;

class RestaurantEntityFilter
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

        // show without restaurant or with restaurant granted to
        if ($admin->hasRole(RoleInterface::ROLE_COMPANY_ADMIN)) {
            $where = 'entity.fkCompany IS NULL';

            if (count($admin->getCompanies())) {
                $where .= ' OR entity.fkCompany IN (' . implode(', ', $admin->getCompanies()) . ')';
            }

            $qb->andWhere($where);
        }

        return $qb;
    }
}
