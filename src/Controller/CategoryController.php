<?php

namespace App\Controller;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CategoryController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Category::class);

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Category::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Category::class);

        return parent::searchAction();
    }

    protected function editAction()
    {
        $this->denyAccessUnlessGranted('edit', Category::class);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $this->denyAccessUnlessGranted('delete', Category::class);

        return parent::deleteAction();
    }

    protected function showAction()
    {
        $this->denyAccessUnlessGranted('show', Category::class);

        return parent::showAction();
    }
}
