<?php

namespace App\Security;

use App\Entity\ACL\Admin;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class AdminEntityVoter extends Voter
{
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
        return $subject instanceof Admin || Admin::class === $subject || 'Admin' === $subject;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $admin = $token->getUser();

        /** @var Admin $admin */
        if (!$admin instanceof Admin) {
            return false;
        }

        switch ($attribute) {
            case ActionInterface::ACTION_DELETE:
                return $this->canDelete($subject, $admin);
            case ActionInterface::ACTION_EDIT:
                return $this->canEdit();
            case ActionInterface::ACTION_LIST:
                return $this->canList();
            case ActionInterface::ACTION_NEW:
                return $this->canNew();
            case ActionInterface::ACTION_SEARCH:
                return $this->canSearch();
            case ActionInterface::ACTION_SHOW:
                return $this->canShow();
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canDelete(Admin $subject, Admin $admin)
    {
        if (!$this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN)) {
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
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN);
    }

    private function canList()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN);
    }

    private function canNew()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN);
    }

    private function canSearch()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN);
    }

    private function canShow()
    {
        return $this->security->isGranted(RoleInterface::ROLE_SUPER_ADMIN);
    }
}
