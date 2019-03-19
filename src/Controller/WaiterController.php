<?php

namespace App\Controller;

use App\Entity\Waiter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class WaiterController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Waiter::class);

        //@todo add filter to show only entities user has access to

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Waiter::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Waiter::class);

        //@todo add filter to show only entities user has access to

        return parent::searchAction();
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Waiter $waiter */
        $waiter = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $waiter);

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

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Waiter $waiter */
        $waiter = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $waiter);

        return parent::showAction();
    }
}
