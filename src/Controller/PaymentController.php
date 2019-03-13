<?php

namespace App\Controller;

use App\Entity\Payment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class PaymentController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Payment::class);

        return parent::listAction();
    }
}
