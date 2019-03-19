<?php

namespace App\Controller;

use App\Entity\Company;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class CompanyController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Company::class);

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Company::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Company::class);

        return parent::searchAction();
    }

    protected function editAction()
    {
        $this->denyAccessUnlessGranted('edit', Company::class);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $this->denyAccessUnlessGranted('delete', Company::class);

        return parent::deleteAction();
    }

    protected function showAction()
    {
        $this->denyAccessUnlessGranted('show', Company::class);

        return parent::showAction();
    }
}
