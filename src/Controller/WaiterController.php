<?php

namespace App\Controller;

use App\Entity\Waiter;
use App\Security\Filter\RestaurantEntityFilter;
use App\Security\Filter\WaiterEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class WaiterController extends EasyAdminController
{
    /**
     * @var WaiterEntityFilter
     */
    private $filter;

    /**
     * @var RestaurantEntityFilter
     */
    private $filterRestaurant;

    public function __construct(WaiterEntityFilter $filter, RestaurantEntityFilter $filterRestaurant)
    {
        $this->filter = $filter;
        $this->filterRestaurant = $filterRestaurant;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Waiter::class);

        return parent::listAction();
    }

    protected function createWaiterListQueryBuilder(
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
        $this->denyAccessUnlessGranted('new', Waiter::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Waiter::class);

        return parent::searchAction();
    }

    protected function createWaiterSearchQueryBuilder(
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

        /** @var Waiter $waiter */
        $waiter = $easyadmin['item'];

        $this->denyAccessUnlessGranted('edit', $waiter);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Waiter $waiter */
        $waiter = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $waiter);

        return parent::deleteAction();
    }

    protected function removeEntity($entity)
    {
        /* @var Waiter $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Waiter $waiter */
        $waiter = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $waiter);

        return parent::showAction();
    }

    protected function createWaiterEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderRestaurant */
        $formBuilderRestaurant = $formBuilder->get('fkRestaurant');
        $formBuilderRestaurant->setAttribute(
            'choice_list',
            $this->filterRestaurant->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
