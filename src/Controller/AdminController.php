<?php

namespace App\Controller;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Admin::class);

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Admin::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Admin::class);

        return parent::newAction();
    }

    protected function editAction()
    {
        $this->denyAccessUnlessGranted('edit', Admin::class);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Admin $itemToDelete */
        $itemToDelete = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $itemToDelete);

        return parent::deleteAction();
    }
}
