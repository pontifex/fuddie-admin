<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Security\Filter\RestaurantEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class RestaurantController extends EasyAdminController
{
    /**
     * @var RestaurantEntityFilter
     */
    private $filter;

    public function __construct(RestaurantEntityFilter $filter)
    {
        $this->filter = $filter;
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
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('acl');

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
}
