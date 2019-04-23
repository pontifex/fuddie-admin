<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Security\Filter\CategoryEntityFilter;
use App\Security\Filter\CompanyEntityFilter;
use App\Security\Filter\RestaurantEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class RestaurantController extends EasyAdminController
{
    /**
     * @var RestaurantEntityFilter
     */
    private $filter;

    /**
     * @var CompanyEntityFilter
     */
    private $filterCompany;

    /**
     * @var CategoryEntityFilter
     */
    private $filterCategory;

    public function __construct(
        RestaurantEntityFilter $filter,
        CompanyEntityFilter $filterCompany,
        CategoryEntityFilter $filterCategory
    ) {
        $this->filter = $filter;
        $this->filterCompany = $filterCompany;
        $this->filterCategory = $filterCategory;
    }

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
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder($this->entity, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterListQueryBuilder($qb, $this->getUser());
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

    protected function createRestaurantSearchQueryBuilder(
        $entityClass,
        $searchQuery,
        array $searchableFields,
        $sortField = null,
        $sortDirection = null,
        $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createSearchQueryBuilder($this->entity, $searchQuery, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterSearchQueryBuilder($qb, $this->getUser());
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

    protected function removeEntity($entity)
    {
        /* @var Restaurant $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('default');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $restaurant);

        return parent::showAction();
    }

    protected function createRestaurantEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderCompany */
        $formBuilderCompany = $formBuilder->get('fkCompany');
        $formBuilderCompany->setAttribute(
            'choice_list',
            $this->filterCompany->createLazyLoader($this->em, $this->getUser())
        );

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderCategory */
        $formBuilderCategory = $formBuilder->get('category');
        $formBuilderCategory->setAttribute(
            'choice_list',
            $this->filterCategory->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
