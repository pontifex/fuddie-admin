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
}
