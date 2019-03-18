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

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Payment::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Payment::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Payment $payment */
        $payment = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $payment);

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

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Payment $payment */
        $payment = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $payment);

        return parent::showAction();
    }
}
