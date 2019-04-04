<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\Waiter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class WaiterEntityVoter extends Voter
{
    private const ACTION_DELETE = 'delete';
    private const ACTION_EDIT = 'edit';
    private const ACTION_LIST = 'list';
    private const ACTION_NEW = 'new';
    private const ACTION_SEARCH = 'search';
    private const ACTION_SHOW = 'show';

    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        return $subject instanceof Waiter || Waiter::class === $subject || 'Waiter' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var Waiter $waiter */
        $waiter = $subject;

        switch ($attribute) {
            case ActionInterface::ACTION_DELETE:
                return $this->canDelete($waiter, $admin);
            case ActionInterface::ACTION_EDIT:
                return $this->canEdit($waiter, $admin);
            case ActionInterface::ACTION_LIST:
                return $this->canList();
            case ActionInterface::ACTION_NEW:
                return $this->canNew();
            case ActionInterface::ACTION_SEARCH:
                return $this->canSearch();
            case ActionInterface::ACTION_SHOW:
                return $this->canShow($waiter, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($waiter->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($waiter->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }

    private function canEdit(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($waiter->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($waiter->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
        ;
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
        ;
    }

    private function canShow(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN)
            && in_array($waiter->getFkRestaurant()->getId(), $admin->getRestaurants())
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($waiter->getFkRestaurant()->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }
}
