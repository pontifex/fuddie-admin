<?php

namespace App\Controller;

use App\Entity\Order;
use App\Security\Filter\OrderEntityFilter;
use App\Security\Filter\OrderStatusEntityFilter;
use App\Security\Filter\PaymentEntityFilter;
use App\Security\Filter\RestaurantEntityFilter;
use App\Security\Filter\UserEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class OrderController extends EasyAdminController
{
    /**
     * @var OrderEntityFilter
     */
    private $filter;

    /**
     * @var OrderStatusEntityFilter
     */
    private $filterOrderStatus;

    /**
     * @var PaymentEntityFilter
     */
    private $filterPayment;

    /**
     * @var RestaurantEntityFilter
     */
    private $filterRestaurant;

    /**
     * @var UserEntityFilter
     */
    private $filterUser;

    public function __construct(
        OrderEntityFilter $filter,
        OrderStatusEntityFilter $filterOrderStatus,
        PaymentEntityFilter $filterPayment,
        RestaurantEntityFilter $filterRestaurant,
        UserEntityFilter $filterUser
    ) {
        $this->filter = $filter;
        $this->filterOrderStatus = $filterOrderStatus;
        $this->filterPayment = $filterPayment;
        $this->filterRestaurant = $filterRestaurant;
        $this->filterUser = $filterUser;
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
        /** @var Order $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('default');

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

    protected function createOrderEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderOrderStatus */
        $formBuilderOrderStatus = $formBuilder->get('fkOrderStatus');
        $formBuilderOrderStatus->setAttribute(
            'choice_list',
            $this->filterOrderStatus->createLazyLoader($this->em, $this->getUser())
        );

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderPayment */
        $formBuilderPayment = $formBuilder->get('fkPayment');
        $formBuilderPayment->setAttribute(
            'choice_list',
            $this->filterPayment->createLazyLoader($this->em, $this->getUser())
        );

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderRestaurant */
        $formBuilderRestaurant = $formBuilder->get('fkRestaurant');
        $formBuilderRestaurant->setAttribute(
            'choice_list',
            $this->filterRestaurant->createLazyLoader($this->em, $this->getUser())
        );

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderUser */
        $formBuilderUser = $formBuilder->get('fkUser');
        $formBuilderUser->setAttribute(
            'choice_list',
            $this->filterUser->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
