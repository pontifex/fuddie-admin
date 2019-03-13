<?php

namespace App\Security;

use App\Entity\Admin;
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
        return ($subject instanceof Restaurant || $subject === Restaurant::class || $subject === 'Restaurant');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (! $admin instanceof Admin) {
            return false;
        }

        /** @var Restaurant $restaurant */
        $restaurant = $subject;

        switch ($attribute) {
            case self::ACTION_DELETE:
                return $this->canDelete($restaurant, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit($restaurant, $admin);
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew($restaurant, $admin);
            case self::ACTION_SEARCH:
                return $this->canSearch($restaurant, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Restaurant $restaurant, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canEdit(Restaurant $restaurant, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canList()
    {
        return ($this->security->isGranted('ROLE_COMPANY_ADMIN'));
    }

    private function canNew(Restaurant $restaurant, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canSearch(Restaurant $restaurant, Admin $admin)
    {
        // @todo implement me
        return false;
    }
}
