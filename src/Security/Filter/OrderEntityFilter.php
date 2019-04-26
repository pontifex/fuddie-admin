<?php

namespace App\Security\Filter;

use App\Entity\ACL\Admin;
use App\Entity\Order;
use App\Entity\Restaurant;
use App\Security\RoleInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\ChoiceList\DoctrineChoiceLoader;
use Symfony\Bridge\Doctrine\Form\ChoiceList\ORMQueryBuilderLoader;

class OrderEntityFilter
{
    public function createLazyLoader(EntityManager $em, Admin $admin = null)
    {
        $qb = $this->filterListQueryBuilder(
            $this->createQueryBuilder($em),
            $admin
        );

        return new \Symfony\Component\Form\ChoiceList\LazyChoiceList(
            new DoctrineChoiceLoader(
                $em,
                Order::class,
                null,
                new ORMQueryBuilderLoader($qb)
            ),
            function ($choice) {
                /** @var Order $choice */
                return $choice->getId();
            }
        );
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

    private function createQueryBuilder(EntityManager $em)
    {
        $qb = new QueryBuilder($em);

        $qb->select('entity')
            ->from(Order::class, 'entity');

        return $qb;
    }
}
