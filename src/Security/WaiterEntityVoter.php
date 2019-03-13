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
        return ($subject instanceof Waiter || $subject === Waiter::class || $subject === 'Waiter');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (! $admin instanceof Admin) {
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
                return $this->canNew($waiter, $admin);
            case self::ACTION_SEARCH:
                return $this->canSearch($waiter, $admin);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Waiter $waiter, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canEdit(Waiter $waiter, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canList()
    {
        return ($this->security->isGranted('ROLE_COMPANY_ADMIN'));
    }

    private function canNew(Waiter $waiter, Admin $admin)
    {
        // @todo implement me
        return false;
    }

    private function canSearch(Waiter $waiter, Admin $admin)
    {
        // @todo implement me
        return false;
    }
}
