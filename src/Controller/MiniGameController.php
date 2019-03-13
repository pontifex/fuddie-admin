<?php

namespace App\Controller;

use App\Entity\MiniGame;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class MiniGameController extends EasyAdminController
{
    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', MiniGame::class);

        return parent::listAction();
    }
}
