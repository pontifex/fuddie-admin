<?php

namespace App\Controller;

use App\Entity\Payment;
use App\Security\Filter\OrderEntityFilter;
use App\Security\Filter\PaymentEntityFilter;
use App\Security\Filter\PaymentMethodEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class PaymentController extends EasyAdminController
{
    /**
     * @var PaymentEntityFilter
     */
    private $filter;

    /**
     * @var PaymentMethodEntityFilter
     */
    private $filterPaymentMethod;

    /**
     * @var OrderEntityFilter
     */
    private $filterOrder;

    public function __construct(
        PaymentEntityFilter $filter,
        PaymentMethodEntityFilter $filterPaymentMethod,
        OrderEntityFilter $filterOrder
    ) {
        $this->filter = $filter;
        $this->filterPaymentMethod = $filterPaymentMethod;
        $this->filterOrder = $filterOrder;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Payment::class);

        return parent::listAction();
    }

    protected function createPaymentListQueryBuilder(
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
        $this->denyAccessUnlessGranted('new', Payment::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Payment::class);

        return parent::searchAction();
    }

    protected function createPaymentSearchQueryBuilder(
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

        /** @var Payment $payment */
        $payment = $easyadmin['item'];

        $this->denyAccessUnlessGranted('edit', $payment);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Payment $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $restaurant);

        return parent::deleteAction();
    }

    protected function removeEntity($entity)
    {
        /* @var Payment $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('default');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Payment $payment */
        $payment = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $payment);

        return parent::showAction();
    }

    protected function createPaymentEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderPaymentMethod */
        $formBuilderPaymentMethod = $formBuilder->get('fkPaymentMethod');
        $formBuilderPaymentMethod->setAttribute(
            'choice_list',
            $this->filterPaymentMethod->createLazyLoader($this->em, $this->getUser())
        );

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderOrders */
        $formBuilderOrders = $formBuilder->get('orders');
        $formBuilderOrders->setAttribute(
            'choice_list',
            $this->filterOrder->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
