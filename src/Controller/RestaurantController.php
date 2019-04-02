<?php

namespace App\Controller;

use App\Entity\ACL\Admin;
use App\Entity\Restaurant;
use Doctrine\DBAL\Query\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class RestaurantController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Restaurant::class);

        return parent::listAction();
    }

    protected function createRestaurantListQueryBuilder(
        string $entityClass,
        string $sortDirection = null,
        string $sortField = null,
        string $dqlFilter = null
    ) {
        /** @var QueryBuilder $qb */
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder(
            $this->entity,
            $sortField,
            $sortDirection,
            $dqlFilter
        );

        /** @var Admin $admin */
        $admin = $this->getUser();

        if (in_array('ROLE_COMPANY_ADMIN', $admin->getRoles())) {
            if (count($admin->getCompanies())) {
                $qb->where('(entity.fkCompany IS NULL OR entity.fkCompany IN (' . implode(', ', $admin->getCompanies()) . '))');
            } else {
                $qb->where('entity.fkCompany IS NULL');
            }
        }

        return $qb;
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Restaurant::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Restaurant::class);

        return parent::searchAction();
    }

    protected function createSearchQueryBuilder($entityClass, $searchQuery, array $searchableFields, $sortField = null, $sortDirection = null, $dqlFilter = null)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder(
            $this->entity,
            $sortField,
            $sortDirection,
            $dqlFilter
        );

        /** @var Admin $admin */
        $admin = $this->getUser();

        if (in_array('ROLE_COMPANY_ADMIN', $admin->getRoles())) {
            if (count($admin->getCompanies())) {
                $qb->where('(entity.fkCompany IS NULL OR entity.fkCompany IN (' . implode(', ', $admin->getCompanies()) . '))');
            } else {
                $qb->where('entity.fkCompany IS NULL');
            }
        }

        return $qb;
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('edit', $restaurant);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $restaurant);

        return parent::deleteAction();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $restaurant);

        return parent::showAction();
    }
}
