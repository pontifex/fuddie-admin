<?php

namespace App\Controller;

use App\Entity\Company;
use App\Security\Filter\CompanyEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CompanyController extends EasyAdminController
{
    /**
     * @var CompanyEntityFilter
     */
    private $filter;

    public function __construct(CompanyEntityFilter $filter)
    {
        $this->filter = $filter;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Company::class);

        return parent::listAction();
    }

    protected function createMiniGameListQueryBuilder(
        string $entityClass,
        string $sortDirection = null,
        string $sortField = null,
        string $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder($this->entity, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterListQueryBuilder($qb);
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Company::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Company::class);

        return parent::searchAction();
    }

    protected function createMiniGameSearchQueryBuilder(
        $entityClass,
        $searchQuery,
        array $searchableFields,
        $sortField = null,
        $sortDirection = null,
        $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createSearchQueryBuilder($this->entity, $searchQuery, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterSearchQueryBuilder($qb);
    }

    protected function editAction()
    {
        $this->denyAccessUnlessGranted('edit', Company::class);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $this->denyAccessUnlessGranted('delete', Company::class);

        return parent::deleteAction();
    }

    protected function removeEntity($entity)
    {
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $this->denyAccessUnlessGranted('show', Company::class);

        return parent::showAction();
    }
}
