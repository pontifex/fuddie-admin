<?php

namespace App\Controller;

use App\Entity\Category;
use App\Security\Filter\CategoryEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CategoryController extends EasyAdminController
{
    /**
     * @var CategoryEntityFilter
     */
    private $filter;

    public function __construct(CategoryEntityFilter $filter)
    {
        $this->filter = $filter;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Category::class);

        return parent::listAction();
    }

    protected function createCategoryListQueryBuilder(
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
        $this->denyAccessUnlessGranted('new', Category::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Category::class);

        return parent::searchAction();
    }

    protected function createCategorySearchQueryBuilder(
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
        $this->denyAccessUnlessGranted('edit', Category::class);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $this->denyAccessUnlessGranted('delete', Category::class);

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
        $this->denyAccessUnlessGranted('show', Category::class);

        return parent::showAction();
    }
}
