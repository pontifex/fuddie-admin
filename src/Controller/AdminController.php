<?php

namespace App\Controller;

use App\EasyAdmin\AclQueryBuilder;
use App\Entity\ACL\Admin;
use App\Security\Filter\AdminEntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Configuration\ConfigManager;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Search\Autocomplete;
use EasyCorp\Bundle\EasyAdminBundle\Search\Paginator;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class AdminController extends EasyAdminController
{
    /**
     * @var AdminEntityFilter
     */
    private $filter;

    public function __construct(
        AdminEntityFilter $filter
    ) {
        $this->filter = $filter;
    }

    public static function getSubscribedServices(): array
    {
        $result = parent::getSubscribedServices() + [
            'easyadmin.autocomplete' => Autocomplete::class,
            'easyadmin.config.manager' => ConfigManager::class,
            'easyadmin.paginator' => Paginator::class,
            'easyadmin.property_accessor' => PropertyAccessorInterface::class,
            'event_dispatcher' => EventDispatcherInterface::class,
        ];

        // for Admin entity we always set this QueryBuilder (uses correct database)
        $result['easyadmin.query_builder'] = AclQueryBuilder::class;

        return $result;
    }

    protected function listAction()
    {
        $this->denyAccessUnlessGranted('list', Admin::class);

        return parent::listAction();
    }

    protected function createAdminListQueryBuilder(
        string $entityClass,
        string $sortDirection = null,
        string $sortField = null,
        string $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createListQueryBuilder($this->entity, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterListQueryBuilder($qb);
    }

    protected function newAction()
    {
        $this->denyAccessUnlessGranted('new', Admin::class);

        return parent::newAction();
    }

    protected function persistEntity($entity)
    {
        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function searchAction()
    {
        $this->denyAccessUnlessGranted('search', Admin::class);

        return parent::searchAction();
    }

    protected function createAdminSearchQueryBuilder(
        $entityClass,
        $searchQuery,
        array $searchableFields,
        $sortField = null,
        $sortDirection = null,
        $dqlFilter = null
    ) {
        $qb = $this->get('easyadmin.query_builder')->createSearchQueryBuilder($this->entity, $searchQuery, $sortField, $sortDirection, $dqlFilter);

        return $this->filter->filterSearchQueryBuilder($qb);
    }

    protected function editAction()
    {
        $this->denyAccessUnlessGranted('edit', Admin::class);

        return parent::editAction();
    }

    protected function updateEntity($entity)
    {
        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function deleteAction()
    {
        $easyadmin = $this->request->attributes->get('easyadmin');

        /** @var Admin $itemToDelete */
        $itemToDelete = $easyadmin['item'];

        $this->denyAccessUnlessGranted('delete', $itemToDelete);

        return parent::deleteAction();
    }

    protected function removeEntity($entity)
    {
        /* @var Admin $entity */
        // soft delete
        $entity->setDDeletedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager('acl');

        $em->persist($entity);
        $em->flush();
    }

    protected function showAction()
    {
        $this->denyAccessUnlessGranted('show', Admin::class);

        return parent::showAction();
    }
}
