<?php

namespace App\Controller;

use App\Entity\Waiter;
use App\Security\Filter\WaiterEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class WaiterController extends EasyAdminController
{
    /**
     * @var WaiterEntityFilter
     */
    private $filter;

    public function __construct(WaiterEntityFilter $filter)
    {
        $this->filter = $filter;
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
}
