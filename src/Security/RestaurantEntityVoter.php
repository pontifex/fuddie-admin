<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\Restaurant;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class RestaurantEntityVoter extends Voter
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
        return $subject instanceof Restaurant || Restaurant::class === $subject || 'Restaurant' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var Restaurant $restaurant */
        $restaurant = $subject;

        switch ($attribute) {
            case ActionInterface::ACTION_DELETE:
                return $this->canDelete($restaurant, $admin);
            case ActionInterface::ACTION_EDIT:
                return $this->canEdit($restaurant, $admin);
            case ActionInterface::ACTION_LIST:
                return $this->canList();
            case ActionInterface::ACTION_NEW:
                return $this->canNew();
            case ActionInterface::ACTION_SEARCH:
                return $this->canSearch();
            case ActionInterface::ACTION_SHOW:
                return $this->canShow($restaurant, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Restaurant $restaurant, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        // restaurants without company
        if (is_null($restaurant->getFkCompany())
            && $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }

    private function canEdit(Restaurant $restaurant, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        // restaurants without company
        if (is_null($restaurant->getFkCompany())
            && $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }

    private function canNew()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
        ;
    }

    private function canSearch()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
        ;
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
        ;
    }

    private function canShow(Restaurant $restaurant, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        // restaurants without company
        if (is_null($restaurant->getFkCompany())
            && $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)) {
            return true;
        }

        // owner of company to which restaurant belongs
        if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
            && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
        ) {
            return true;
        }

        return false;
    }
}
