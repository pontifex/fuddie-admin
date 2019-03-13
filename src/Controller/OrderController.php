<?php

namespace App\Controller;

use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class OrderController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Order::class);

        return parent::listAction();
    }
}
