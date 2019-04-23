<?php

namespace App\Controller;

use App\Entity\Category;
use App\Security\Filter\CategoryEntityFilter;
use App\Security\Filter\RestaurantEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CategoryController extends EasyAdminController
{
    /**
     * @var CategoryEntityFilter
     */
    private $filter;

    /**
     * @var RestaurantEntityFilter
     */
    private $filterRestaurant;

    public function __construct(CategoryEntityFilter $filter, RestaurantEntityFilter $filterRestaurant)
    {
        $this->filter = $filter;
        $this->filterRestaurant = $filterRestaurant;
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
        /* @var Category $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('default');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $this->denyAccessUnlessGranted('show', Category::class);

        return parent::showAction();
    }

    protected function createCategoryEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderRestaurant */
        $formBuilderRestaurant = $formBuilder->get('restaurant');
        $formBuilderRestaurant->setAttribute(
            'choice_list',
            $this->filterRestaurant->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
