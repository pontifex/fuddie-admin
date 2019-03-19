<?php

namespace App\Controller;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class OrderController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Order::class);

        //@todo add filter to show only entities user has access to

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Order::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Order::class);

        //@todo add filter to show only entities user has access to

        return parent::searchAction();
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Order $order */
        $order = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $order);

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

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Order $order */
        $order = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $order);

        return parent::showAction();
    }
}
