<?php

namespace App\Security;

use App\Entity\Admin;
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
            case self::ACTION_DELETE:
                return $this->canDelete($waiter, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($waiter, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew();
            case self::ACTION_SEARCH:
                return $this->canSearch();
            case self::ACTION_SHOW:
                return $this->canShow($waiter, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && $waiter->getFkRestaurant()->getId() === $admin->getFkRestaurant()
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && $waiter->getFkRestaurant()->getFkCompany()->getId() === $admin->getFkCompany()
        ) {
            return true;
        }

        return false;
    }

    private function canEdit(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && $waiter->getFkRestaurant()->getId() === $admin->getFkRestaurant()
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && $waiter->getFkRestaurant()->getFkCompany()->getId() === $admin->getFkCompany()
        ) {
            return true;
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
        ;
    }

    private function canList()
    {
        return $this->security->isGranted('ROLE_SUPER_ADMIN')
            || $this->security->isGranted('ROLE_COMPANY_ADMIN')
            || $this->security->isGranted('ROLE_RESTAURANT_ADMIN')
        ;
    }

    private function canShow(Waiter $waiter, Admin $admin)
    {
        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return true;
        }

        if (is_null($waiter->getFkRestaurant())
            && ($this->security->isGranted('ROLE_COMPANY_ADMIN') || $this->security->isGranted('ROLE_RESTAURANT_ADMIN'))) {
            return true;
        }

        // owner of restaurant
        if ($this->security->isGranted('ROLE_RESTAURANT_ADMIN')
            && $waiter->getFkRestaurant()->getId() === $admin->getFkRestaurant()
        ) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted('ROLE_COMPANY_ADMIN')
            && $waiter->getFkRestaurant()->getFkCompany()->getId() === $admin->getFkCompany()
        ) {
            return true;
        }

        return false;
    }
}
