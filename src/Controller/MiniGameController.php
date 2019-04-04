<?php

namespace App\Controller;

use App\Entity\MiniGame;
use App\Security\Filter\BadgeEntityFilter;
use App\Security\Filter\MiniGameEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class MiniGameController extends EasyAdminController
{
    /**
     * @var MiniGameEntityFilter
     */
    private $filter;

    /**
     * @var BadgeEntityFilter
     */
    private $filterBadge;

    public function __construct(MiniGameEntityFilter $filter, BadgeEntityFilter $filterBadge)
    {
        $this->filter = $filter;
        $this->filterBadge = $filterBadge;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', MiniGame::class);

        return parent::listAction();
    }

    protected function createMiniGameListQueryBuilder(
        string $entityClass,
        string $sortDirection = null,
        string $sortField = null,
        string $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder($this->entity, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterListQueryBuilder($qb, $this->getUser());
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

    protected function createMiniGameSearchQueryBuilder(
        $entityClass,
        $searchQuery,
        array $searchableFields,
        $sortField = null,
        $sortDirection = null,
        $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createSearchQueryBuilder($this->entity, $searchQuery, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterSearchQueryBuilder($qb, $this->getUser());
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

    protected function removeEntity($entity)
    {
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var MiniGame $miniGame */
        $miniGame = $easyadmin['item'];

        $this->denyAccessUnlessGranted('show', $miniGame);

        return parent::showAction();
    }

    protected function createMiniGameEntityFormBuilder($entity, $view)
    {
        /** @var \Symfony\Component\Form\FormBuilder $formBuilder */
        $formBuilder = $this->createEntityFormBuilder($entity, $view);

        /** @var \Symfony\Component\Form\FormBuilder $formBuilderBadge */
        $formBuilderBadge = $formBuilder->get('fkBadge');
        $formBuilderBadge->setAttribute(
            'choice_list',
            $this->filterBadge->createLazyLoader($this->em, $this->getUser())
        );

        return $formBuilder;
    }
}
