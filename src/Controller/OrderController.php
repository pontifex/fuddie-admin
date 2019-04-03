<?php

namespace App\Controller;

use App\Entity\Order;
use App\Security\Filter\OrderEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class OrderController extends EasyAdminController
{
    /**
     * @var OrderEntityFilter
     */
    private $filter;

    public function __construct(OrderEntityFilter $filter)
    {
        $this->filter = $filter;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Order::class);

        return parent::listAction();
    }

    protected function createOrderListQueryBuilder(
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
        $this->denyAccessUnlessGranted('new', Order::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Order::class);

        return parent::searchAction();
    }

    protected function createOrderSearchQueryBuilder(
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

        /** @var Order $order */
        $order = $easyadmin['item'];

        $this->denyAccessUnlessGranted('edit', $order);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Order $order */
        $order = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $order);

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

        /** @var Order $order */
        $order = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $order);

        return parent::showAction();
    }
}
