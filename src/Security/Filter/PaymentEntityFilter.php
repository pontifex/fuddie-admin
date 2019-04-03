<?php

namespace App\Security\Filter;

use App\Entity\ACL\Admin;
use App\Entity\Order;
use App\Entity\Payment;
use App\Security\RoleInterface;
use Doctrine\ORM\QueryBuilder;

class PaymentEntityFilter
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
        // I need to reverse query and it is why original QueryBuilder argument is not used

        $qb = new QueryBuilder($qb->getEntityManager());

        $qb->select('entity')
            ->from(Order::class, 'o')
            ->innerJoin(Payment::class, 'entity');

        // do not show soft deleted
        $qb->andWhere('entity.dDeletedAt IS NULL');

        if ($admin->hasRole(RoleInterface::ROLE_SUPER_ADMIN)) {
            return $qb;
        }

        // show without restaurant or with restaurant granted to
        if ($admin->hasRole(RoleInterface::ROLE_RESTAURANT_ADMIN)) {
            if (count($admin->getRestaurants())) {
                $qb->andWhere($qb->expr()->in('o.fkRestaurant', implode(', ', $admin->getRestaurants())));
            }
        }

        return $qb;
    }
}
