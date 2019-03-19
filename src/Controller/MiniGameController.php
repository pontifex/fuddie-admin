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

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', MiniGame::class);

        return parent::newAction();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', MiniGame::class);

        return parent::searchAction();
    }

    protected function editAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var MiniGame $miniGame */
        $miniGame = $easyadmin['item'];

        $this->denyAccessUnlessGranted('edit', $miniGame);

        return parent::editAction();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var MiniGame $miniGame */
        $miniGame = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $miniGame);

        return parent::deleteAction();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var MiniGame $miniGame */
        $miniGame = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $miniGame);

        return parent::showAction();
    }
}
