<?php

namespace App\Controller;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class RestaurantController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Restaurant::class);

        return parent::listAction();
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Restaurant::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Restaurant::class);

        //@todo add filter to show only entities user has access to

        return parent::newAction();
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $restaurant);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $restaurant);

        return parent::deleteAction();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Restaurant $restaurant */
        $restaurant = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $restaurant);

        return parent::showAction();
    }
}
