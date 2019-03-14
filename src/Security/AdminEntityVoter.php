<?php

namespace App\Security;

use App\Entity\Admin;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class AdminEntityVoter extends Voter
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
        return ($subject instanceof Admin || $subject === Admin::class || $subject === 'Admin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (! $admin instanceof Admin) {
            return false;
        }

        switch ($attribute) {
            case self::ACTION_DELETE:
                return $this->canDelete($subject, $admin);
            case self::ACTION_EDIT:
                return $this->canEdit();
            case self::ACTION_LIST:
                return $this->canList();
            case self::ACTION_NEW:
                return $this->canNew();
            case self::ACTION_SEARCH:
                return $this->canSearch();
            case self::ACTION_SHOW:
                return $this->canShow();
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Admin $subject, Admin $admin)
    {
        if (! $this->security->isGranted('ROLE_SUPER_ADMIN')) {
            return false;
        }

        // do not delete yourself
        if ($subject->getId() === $admin->getId()) {
            return false;
        }

        return true;
    }

    private function canEdit()
    {
        return ($this->security->isGranted('ROLE_SUPER_ADMIN'));
    }

    private function canList()
    {
        return ($this->security->isGranted('ROLE_SUPER_ADMIN'));
    }

    private function canNew()
    {
        return ($this->security->isGranted('ROLE_SUPER_ADMIN'));
    }

    private function canSearch()
    {
        return ($this->security->isGranted('ROLE_SUPER_ADMIN'));
    }

    private function canShow()
    {
        return ($this->security->isGranted('ROLE_SUPER_ADMIN'));
    }
}
