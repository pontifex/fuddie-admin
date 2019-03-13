<?php

namespace App\Controller;

use App\Entity\Waiter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class WaiterController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Waiter::class);

        return parent::listAction();
    }
}
