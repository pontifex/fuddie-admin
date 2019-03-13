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
}
