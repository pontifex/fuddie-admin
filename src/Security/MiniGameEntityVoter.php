<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use App\Entity\MiniGame;
use App\Entity\Restaurant;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class MiniGameEntityVoter extends Voter
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
        return $subject instanceof MiniGame || MiniGame::class === $subject || 'MiniGame' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        /** @var MiniGame $miniGame */
        $miniGame = $subject;

        switch ($attribute) {
            case self::ACTION_DELETE:
                return $this->canDelete($miniGame, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($miniGame, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew();
            case self::ACTION_SEARCH:
                return $this->canSearch();
            case self::ACTION_SHOW:
                return $this->canShow($miniGame, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(MiniGame $miniGame, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        /** @var Restaurant $restaurant */
        foreach ($miniGame->getRestaurants() as $restaurant) {
            if (is_null($restaurant)
                && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))
            ) {
                continue;
            }

            // owner of company to which restaurant belongs
            if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
                && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
            ) {
                return true;
            }
        }

        return false;
    }

    private function canEdit(MiniGame $miniGame, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        /** @var Restaurant $restaurant */
        foreach ($miniGame->getRestaurants() as $restaurant) {
            if (is_null($restaurant)
                && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))
            ) {
                continue;
            }

            // owner of company to which restaurant belongs
            if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
                && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
            ) {
                return true;
            }
        }

        return false;
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)
            || $this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
        ;
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

    private function canShow(MiniGame $miniGame, Admin $admin)
    {
        if ($this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
            return true;
        }

        /** @var Restaurant $restaurant */
        foreach ($miniGame->getRestaurants() as $restaurant) {
            if (is_null($restaurant)
                && ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN) || $this->security->isGranted(RoleInterface::ROLE_RESTAURANT_ADMIN))
            ) {
                continue;
            }

            // owner of company to which restaurant belongs
            if ($this->security->isGranted(RoleInterface::ROLE_COMPANY_ADMIN)
                && in_array($restaurant->getFkCompany()->getId(), $admin->getCompanies())
            ) {
                return true;
            }
        }

        return false;
    }
}
